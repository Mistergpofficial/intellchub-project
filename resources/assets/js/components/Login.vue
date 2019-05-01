<template>
    <div>
        <div class="main-wrapper account-wrapper">
            <div class="account-page">
                <div class="account-center">
                    <div class="account-box">
                        <form action="" class="form-signin">
                            <div class="account-logo">
                                <a :href="`http://localhost:7080/intell`"><img :src="`http://localhost:7080/intell/public/images/logo-dark.png`" alt=""></a>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group text-right">
                                <a href="forgot-password.html">Forgot your password?</a>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary account-btn">Login</button>
                            </div>
                            <div class="text-center register-link">
                                Don’t have an account? <a :href="`http://localhost:7080/intell/account/register`">Register Now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>