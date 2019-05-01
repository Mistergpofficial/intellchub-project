<template>
    <div>
        <div class="main-wrapper  account-wrapper">
            <div class="account-page">
                <div class="account-center">
                    <div class="account-box">
                        <form action="" class="form-signin">
                            <div class="account-logo">
                                <a :href="`http://localhost:7080/intell`"><img :src="`http://localhost:7080/intell/images/logo-dark.png`" alt=""></a>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" v-model="user.username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" v-model="user.email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" v-model="user.password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile" v-model="user.mobile" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Signup</button>
                            </div>
                            <div class="text-center login-link">
                                Already have an account? <a :href="`http://localhost:7080/intell`">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import http from 'http'
    //import { success, error } from "../../notify";
    //import handleError from "../../error";
    export default {
        name: "register",
        data() {
            return {
                user: {
                    username: '',
                    email: '',
                    password: '',
                    mobile: ''
                }
            }
        },
        methods: {
            next() {
                if (this.user.username === "" || this.user.username === undefined) {
                    error("Ooops! Username can't be empty");
                    return;
                }
                if (this.user.email === "" || this.user.email === undefined) {
                    error("Ooops! Email can't be empty");
                    return;
                }
                if (this.user.password === "" || this.user.password === undefined) {
                    error("Ooops! Password can't be empty");
                    return;
                }
                if (this.user.mobile === "" || this.user.mobile === undefined) {
                    error("Ooops! Mobile can't be empty");
                    return;
                }
                this.save();
            },
            save() {
                this.$store.dispatch("SET_USER", this.user);
            }
        }

    }
</script>