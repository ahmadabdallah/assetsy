<template>
    <div>
        <h1 class="font-normal text-3xl text-grey-darkest leading-none mb-8">
            Achievements
        </h1>

        <ul>
            <li v-for="achievement in achievements" v-text="achievement">
            </li>
        </ul>

    </div>
</template>

<script>
    export default {
        data() {
            return {achievements: []}
        },
        created(){
            axios.get('http://assetsy.wip/api/achievements')
                .then(response => {
                    this.achievements = response.data;
                })
        }
    }
</script>