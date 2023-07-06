<template>
    <app-layout>
        <template #header>
            {{ course.title }}
        </template>
        <div class="py-4 mx-8">
            <div class="text-2xl">{{ this.courseShow.episodes[this.currentKey].title }}</div>
            <iframe class="w-full h-screen" :src="this.courseShow.episodes[this.currentKey].video_url"
                title="Application full stack Laravel et InertiaJS - Afficher les épisodes" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
            <div class="py-3 text-sm text-gray-500">{{ this.courseShow.episodes[this.currentKey].description }}</div>
            <div class="mt-6">
                <ul v-for="(episode, index) in this.courseShow.episodes" v-bind:key="episode.id">
                    <li class="flex items-center justify-between mt-3">
                        <div>
                            Episode n°{{ index + 1 }} - {{ episode.title }}
                            <button class="text-gray-500 focus:text-indigo-500 focus:outline-none" 
                            @click="switchEpisode(index)">Voir l'épisode</button>
                        </div>
                        <ProgressButton :episode-id="episode.id" />
                    </li>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import ProgressButton from './ProgressButton.vue';

export default {
    components: {
        AppLayout,
        ProgressButton
    },

    props: ['course'],

    data() {
        return {
            courseShow: this.course,
            currentKey: 0
        }
    },

    methods: {
        switchEpisode(index) {
            this.currentKey = index;

            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            })
        }
    },

    mounted() {
        // console.log(this.courseShow);
    }

}
</script>