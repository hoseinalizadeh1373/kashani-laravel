import axios from 'axios'
import { defineStore } from 'pinia'
import Cookies from 'js-cookie'
import { ref, computed } from 'vue';

export const useAuthStore = defineStore('auth', () => {

    // states
    const
        authenticatedUser = ref(null),
        loginFormDisplay = ref(false),
        intended_url = ref("")


    // getters
    // const user = computed(function(){return authenticatedUser.value})
    const
        user = computed(() => authenticatedUser.value),
        isLogedIn = computed(() => authenticatedUser.value !== null),
        intendedUrl = computed(() => intended_url.value),
        access_token = computed(() => Cookies.get('token')),
        roles = computed(() => authenticatedUser.value.roles);

    //actions
    function setIntendedUrl(url) {
        intended_url.value = url
    }

    function showLoginForm() {
        loginFormDisplay.value = true
    }

    function hideLoginform() {
        loginFormDisplay.value = false
    }


    function requestToken(mobile) {
        return new Promise((resolve, reject) => {

            axios.post("/api/auth/requestToken", {
               mobile: mobile,
               
            })
            .then((res) => {
                resolve (res);
               
            })
            .catch((err) => {
               reject(err)
                //
            })
            
        });
           
    }


    function login(mobile, password) {
        return new Promise((resolve, reject) => {
            axios.post("/api/auth/login", { mobile, password })
                .then(res => {

                    if (!res.data.hasOwnProperty("access_token")) {
                        reject("NoAccessToken");
                    }

                    Cookies.set('token', res.data.access_token, { expires: true ? 365 : null })

                    resolve(true)

                })
                .catch(err => {
                    reject(err)
                });
        });

    }

    function register(data) {
        return new Promise((resolve, reject) => {
            axios.post("/api/auth/register", data)
                .then(res => {

                    if (!res.data.hasOwnProperty("access_token")) {
                        reject("NoAccessToken");
                    }

                    Cookies.set('token', res.data.access_token, { expires: true ? 365 : null })

                    resolve(true)

                })
                .catch(err => {
                    reject(err)
                });
        });

    }

    function logout() {
        return new Promise((resolve, reject) => {
            axios.post("/api/auth/logout").then(res => {
                authenticatedUser.value = null
                resolve(true)
            })
        })
    }

    function logoutAndShowLoginForm() {
        logout().then(x => {
            showLoginForm();
        })
    }

    function fetchUser() {
        return new Promise((resolve, reject) => {
            if (Cookies.get("token") == undefined) {
                reject(false)
                return;
            }
            axios.post("/api/auth/me")
                .then(res => {
                    authenticatedUser.value = res.data
                    resolve(res.data)
                })
                .catch(err => {
                    reject(false)
                })
        });
    }

    function hasRole(role) {
        if (!isLogedIn.value) return false
        return authenticatedUser.value.roles.includes(role)
    }

    return {
        loginFormDisplay,

        access_token,
        user,
        isLogedIn,
        intendedUrl,
        roles,

        setIntendedUrl,
        showLoginForm,
        hideLoginform,
        requestToken,

        register,
        logout,
        logoutAndShowLoginForm,
        fetchUser,
        hasRole
    }
})