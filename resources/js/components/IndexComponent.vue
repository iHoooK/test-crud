<template>
    <div>
        <CreateComponent></CreateComponent>
        <IndexComponent></IndexComponent>
    </div>
</template>

<script>
import CreateComponent from '@/components/User/CreateComponent.vue';
import IndexComponent  from '@/components/User/IndexComponent.vue';

export default {
    name: 'Index',

    components: {
        CreateComponent,
        IndexComponent,
    },
};
</script>

<style scoped>

</style>