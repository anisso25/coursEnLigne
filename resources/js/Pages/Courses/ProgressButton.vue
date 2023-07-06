<template>
    <div>
        <button class="px-2 py-2 text-white bg-green-500 rounded" 
        @click="toggleProgress()" >Terminé ?</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: ['episodeId'],

    methods: {
        toggleProgress() {
            axios.post('/toggleProgress', {
                episodeId: this.episodeId,
            })
                .then(Response => console.log(Response))
                .catch(error => console.log(error));
        }
    }
}
</script>