/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$http = axios;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import {appDomain} from "./config"
import {register} from "./config"
import {adminReg} from "./config"
import {login} from "./config"

const app = new Vue({
    el: '#app',
    data() {
        return {
            userData: {
                full_name: '',
                username: '',
                email: '',
                password: '',
                password_confirmation: '',
                mobile: ''
            },
            admin: {
                full_name: '',
                username: '',
                email: '',
                password: '',
                password_confirmation: '',
                mobile: ''
            },
            loginData: {
                email: '',
                password: '',
            },
            errors: {},
            submitted: false
        }
    },
    methods: {
        next() {
            this.$http.post(register, this.userData)
                .then(response=>{
                    this.submitted = true;
                    this.userData = "";
                })
                .catch(error=> {
                    this.errors = error.response.data.errors;
                })
        },
        register(){
            this.$http.post(adminReg, this.admin)
                .then(response=>{
                    this.submitted = true;
                    this.admin = "";
                })
                .catch(error=>  {
                    this.errors = error.response.data.errors;
                    //alert('Not good man :(');
                });
        },
        login(){
            this.$http.post(login, this.loginData)
                .then(function (response) {
                    console.log(response);
                   // window.location = `${Laravel.appUrl}/user/dashboard`
                    window.location = appDomain + 'user/dashboard'

                })
                .catch( (error) => {
                    this.errors = error.response.data.errors;
                });
        },
        getSignupError(field){
            if (this.errors.hasOwnProperty(field) ) {
                if (typeof this.errors[field] === "object") {
                    return this.errors[field][0];
                }
                if ( typeof this.errors[field] === "string" ) {
                    return this.errors[field]
                }
            }
        },
        getLoginError(field){
            if (this.errors.hasOwnProperty(field) ){
                if ( typeof this.errors[field] === "object" ) return this.errors[field][0];
                if ( typeof this.errors[field] === "string" ) return this.errors[field];
            }
        },
        clear(field) {
            delete this.errors[field];
        },



    }

});
