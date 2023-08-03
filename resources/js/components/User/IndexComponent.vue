<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Возраст</th>
            <th scope="col">Пол</th>
            <th scope="col">Изменить</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="user in users">
            <tr :class="isEdit(user) ? 'd-none' : ''">
                <th scope="row">{{ user.id }}</th>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.age }}</td>
                <td>{{ user.sex ? 'Мужской' : 'Женский' }}</td>
                <td><a href="#" @click.prevent="changeEditUserId(user)" class="btn btn-primary">Изменить</a></td>
                <td><a @click.prevent="destroy(user)" class="btn btn-danger">Удалить</a></td>
            </tr>
            <tr :class="isEdit(user) ? '' : 'd-none'">
                <th scope="row">{{ user.id }}</th>
                <td><input type="text" class="form-control" v-model="name"></td>
                <td><input type="email" class="form-control" v-model="email"></td>
                <td><input type="number" class="form-control" v-model="age"></td>
                <td>
                    <select name="sex">
                        <option disabled selected>Пол</option>
                        <option value="1">Мужской</option>
                        <option value="0">Женский</option>
                    </select>
                </td>
                <td><a href="#" @click.prevent="update(user)" class="btn btn-primary">Обновить</a></td>
                <td><a @click.prevent="destroy(user)" class="btn btn-danger">Удалить</a></td>
            </tr>
        </template>
        </tbody>
    </table>
</template>

<script>

export default {
    name: 'IndexComponent',

    data() {

        return {
            users: null,
            editUserId: null,
            name: null,
            email: null,
            age: null,
            sex: null,
            password: 'null',
        };
    },

    mounted() {
        this.getUsers();
    },

    methods: {
        getUsers() {
            axios.get('/api/users')
                 .then(result => {
                     this.users = result.data;
                 });
        },

        changeEditUserId(user) {
            this.editUserId = user.id;
            this.name       = user.name;
            this.email      = user.email;
            this.age        = user.age;
            this.sex        = user.sex;
        },

        isEdit(user) {
            return this.editUserId === user.id;
        },

        update(user) {
            this.editUserId = null;
            axios.patch(`/api/users/${user.id}`, {name: this.name, email: this.email, age: this.age, sex: this.sex})
                 .then(result => {
                     this.getUsers();
                 });

        },

        destroy(user) {
            axios.delete(`api/users/${user.id}`)
                 .then(result => {
                     this.getUsers();
                 })
                 .catch(error => {
                     console.log('Error', error);
                 });
        },

    },
};
</script>

<style scoped>

</style>