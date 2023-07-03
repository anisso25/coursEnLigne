<template>
    <div>
        <h1>{{ message }}</h1>
        <button @click="changeMessage">Changer le message</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: 'Bonjour, Monde!'
        }
    },
    methods: {
        changeMessage() {
            this.message = 'Salut, tout le monde!'
        }
    },
    created() {
    console.log('Le composant a été créé.')
    }
}
</script>

<style scoped>
    h1 {
        color: blue;
    }
</style>