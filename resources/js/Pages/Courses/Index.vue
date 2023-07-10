<template>
    <app-layout>
        <template #header>
            Liste des formation
        </template>
        <div class="py-3" v-for="cours in this.courseList" v-bind:key="cours.id" >
            <div class="p-4 mx-8 bg-white rounded shadow">
                <div class="text-sm text-gray-500">Mise en ligne par {{ cours.user.name }} - <span
                class="text-sm text-gray-500">{{ cours.participants }} participant<span v-if="parseInt(cours.participants) > 1 ">s</span>
                </span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="text-2xl">{{ cours.title }}</div>
                    <div class="text-sm text-gray-400">{{ cours.episodes_count }} épisodes</div>
                </div>
                <div class="text-sm text-gray-500">{{ cours.description }}</div>
                <!-- <a :href="route('courses.show')" class="inline-block px-2 py-1 mt-3 text-sm bg-indigo-500 rounded te-xt-white hover:bg-indigo-700" >Voir la formation</a> -->
                <a :href="'course/' + cours.id" class="inline-block px-2 py-1 mt-3 text-sm bg-indigo-500 rounded te-xt-white hover:bg-indigo-700" >Voir la formation</a>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    components: {
        AppLayout
    },

    props: [
        'cours'
    ],

    data(){ 
        return{ 
            courseList: this.cours
        }
    },

    mounted(){
        console.log(this.courseList);
    }
    
}
</script>