<template>
    <div>
    <div class="w-full bg-gray-200 rounded">
        <div class="text-center text-white bg-green-500 rounded-l">
            {{ percentage }}
        </div>
    </div>
    </div>
</template>
<script>
export default {
    props: ['watchedEpisodes', 'episodes'],

    computed: {
        percentage() {
            let filteredEp = this.episodes.filter(courseEp => {
                return this.watchedEpisodes.find(watchedEp => {
                    return watchedEp.id === courseEp.id;
                });
            });

            return Math.ceil(filteredEp.length / this.episodes.length * 100);
        }
    },

    mounted() {
        console.log(this.watchedEpisodes, this.episodes);
    }

}
</script>