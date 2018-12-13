<template>
<div>

    <div class="row justify-center">
        <q-card inline class="q-ma-lg q-pa-md justify-center column inline light">
                    <q-card-title class="items-center">
                        Rejestracja
                    </q-card-title>
                    <q-card-main>
                    <form method="POST" action="/register" @submit.prevent="onSubmit">

                        <p><q-input v-model="name" float-label="Nazwa użytkownika:" /></p>
                        <p><q-input v-model="email" type="email" float-label="E-mail:" /></p>
                        <p><q-input v-model="password" type="password" float-label="Hasło:" /></p>
                        <p><q-input v-model="password_confirmation" type="password" float-label="Potwierdź Hasło:" /></p>
                        <p class="center">
                            <q-btn color="primary" type="submit" icon-right="send" label="Załóż konto"></q-btn>
                        </p>
                    </form>
                    </q-card-main>
                    <p class="center">albo, jeśli posiadasz już konto</p>
                    <p class="center">
                        <q-btn color="secondary" to="/login" icon-right="assignment_ind" label="Zaloguj się"></q-btn>
                    </p>
        </q-card>

    </div>
</div>
</template>

<script>


    export default {
        name: 'app',

        data() {
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                errors: {}
            }
        },
        methods: {

                onSubmit() {
                    axios.post('/register', this.$data)
                        .then(response => window.location = "/home")
                        .catch(error => this.$q.notify({
                            icon: 'warning',
                            message:'nieprawidłowy login lub hasło',
                            timeout: 0
                            }))
                }

        }
   }



</script>

<style>
body {
    padding-top: 50px;
}

/* .row {
    margin-top:10px;
} */

.q-card-title {
    text-align: center;
}

.center {
    text-align: center;
    padding-top: 0px;
}

</style>
