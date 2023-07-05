<template>
    <app-layout>
        <template #header>
            {{ course.title }}
        </template>
        <div class="py-4 mx-8">
            <div class="text-2xl">{{ course.episodes[0].title }}</div>
            <!-- <iframe class="w-full h-screen" src="https://www.dailymotion.com/embed/video/x8m9hym?autoplay=1" 
            width="100%" height="100%" allowfullscreen title="Dailymotion Video Player" allow="autoplay"> </iframe> -->
            
            <!-- <iframe class="w-full h-screen" src="https://www.youtube.com/embed/SlX03hcCayE?list=PLeeuvNW2FHVjrsrvuVZwyqNIyDvYNn33E" 
            title="Application full stack Laravel et InertiaJS - Afficher les épisodes" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen></iframe> -->
            
            <iframe class="w-full h-screen" :src="course.episodes[0].video_url"
                title="Application full stack Laravel et InertiaJS - Afficher les épisodes" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            
            <div class="text-sm text-gray-500">{{ course.episodes[0].description }}</div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    components: {
        AppLayout
    },

    props: ['course'],

    data() {
        return {
            courseShow: this.course
        }
    },

    mounted() {
        // console.log(this.courseShow);
    }

}
</script>