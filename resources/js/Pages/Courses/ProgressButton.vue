<template>
    <div>
        <button class="px-2 py-2 text-white rounded" :class="isWatched ? 'bg-green-500' : 'bg-red-500'" @click="toggleProgress()">
            {{ isWatched ? 'Terminé' : 'Terminé ?' }}
        </button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        episodeId: {
            type: Number,
            required: true
        }
    },

    data() {
        return {
            isWatched: null
        }
    },

    methods: {
        toggleProgress() {
            axios.post('/toggleProgress', {
                episodeId: this.episodeId,
            })
                .then(response => {
                    if (response.status === 200) {
                        this.isWatched = !this.isWatched;
                        localStorage.setItem(`isWatched_${this.episodeId}`, this.isWatched.toString());
                    }
                })
                .catch(error => console.log(error));
        }
    },

    mounted() {
        const storedIsWatched = localStorage.getItem(`isWatched_${this.episodeId}`);
        this.isWatched = storedIsWatched ? storedIsWatched === 'true' : false;

        axios.get(`/completions/${this.episodeId}`)
            .then(response => {
                if (response.status === 200) {
                    this.isWatched = response.data.isWatched;
                }
            })
            .catch(error => console.log(error));
    },

        isWatched() {
        return this.watchedEpisodes.includes(this.episodeId);
    }
}
</script>
