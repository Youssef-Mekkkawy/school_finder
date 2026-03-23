/**
 * SchoolFinder Egypt — API Helper
 * All fetch calls go through these helpers.
 * Replace API_BASE if your domain changes.
 */

const API_BASE = "/api";

/**
 * Get the auth token from localStorage
 */
function getToken() {
    return localStorage.getItem("sf_token") || null;
}

/**
 * Get the current user from localStorage
 */
function getUser() {
    return JSON.parse(localStorage.getItem("sf_user") || "null");
}

/**
 * Save login data to localStorage
 */
function saveAuth(token, user) {
    localStorage.setItem("sf_token", token);
    localStorage.setItem("sf_user", JSON.stringify(user));
}

/**
 * Clear login data and redirect to login
 */
function logout() {
    localStorage.removeItem("sf_token");
    localStorage.removeItem("sf_user");
    window.location.href = "/login";
}

/**
 * Check if user is logged in
 */
function isLoggedIn() {
    return !!getToken();
}

/**
 * Check if logged in user is admin
 */
function isAdmin() {
    const user = getUser();
    return user && user.role === "admin";
}

/**
 * Build headers for API requests
 * Automatically adds Authorization if token exists
 */
function apiHeaders(withAuth = true) {
    const headers = {
        "Content-Type": "application/json",
        Accept: "application/json",
    };
    if (withAuth) {
        const token = getToken();
        if (token) headers["Authorization"] = `Bearer ${token}`;
    }
    return headers;
}

/**
 * Generic API request
 * Returns { success, data, message, errors } always
 */
async function apiRequest(method, endpoint, body = null, auth = true) {
    try {
        const options = {
            method: method.toUpperCase(),
            headers: apiHeaders(auth),
        };
        if (body && method !== "GET") {
            options.body = JSON.stringify(body);
        }
        const res = await fetch(`${API_BASE}${endpoint}`, options);
        const json = await res.json();

        // Handle 401 — token expired or invalid
        if (res.status === 401) {
            logout();
            return {
                success: false,
                message: "Session expired. Please login again.",
            };
        }

        return json;
    } catch (err) {
        console.error("API Error:", err);
        return { success: false, message: "Network error — please try again." };
    }
}

// ── Shorthand helpers ─────────────────────────────────────────

const api = {
    get: (endpoint, auth = true) => apiRequest("GET", endpoint, null, auth),
    post: (endpoint, body, auth = true) =>
        apiRequest("POST", endpoint, body, auth),
    put: (endpoint, body, auth = true) =>
        apiRequest("PUT", endpoint, body, auth),
    delete: (endpoint, auth = true) =>
        apiRequest("DELETE", endpoint, null, auth),
};

// Make available globally
window.api = api;
window.getToken = getToken;
window.getUser = getUser;
window.saveAuth = saveAuth;
window.logout = logout;
window.isLoggedIn = isLoggedIn;
window.isAdmin = isAdmin;
