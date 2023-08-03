<template>
    <div class="w-25">
        <div class="mt-3">
            <input type="text" class="form-control" v-model="name" id="name" placeholder="Имя">
        </div>
        <div class="mt-3">
            <input type="email" class="form-control" v-model="email" id="email" placeholder="Почта">
        </div>
        <div class="mt-3">
            <input type="password" class="form-control" v-model="password" id="password" placeholder="Пароль">
        </div>
        <div class="mt-3">
            <input type="number" class="form-control" v-model="age" id="password" placeholder="Возраст">
        </div>
        <div class="mt-3">
            <input type="string" class="form-control" v-model="sex" id="password" placeholder="Пол">
        </div>
        <div class="mt-3">
            <input @click.prevent="store" class="btn btn-primary" value="Добавить">
<!--            <input :disabled="isDisabled" @click.prevent="store" class="btn btn-primary" value="Добавить">-->
        </div>
    </div>
</template>

<script>
export default {
    name: 'CreateComponent',

    data() {

        return {
            name: null,
            email: null,
            password: null,
            age: null,
            sex: null,
        };
    },

    mounted() {

    },

    methods: {
        store() {
            axios.post('/api/users', {name: this.name, email: this.email, password: this.password, age: this.age})
                 .then(result => {
                     this.name = null
                     this.email = null
                     this.password = null
                     this.age = null
                     this.sex = null
                 });

        },
    },
};
</script>

<style scoped>

</style>