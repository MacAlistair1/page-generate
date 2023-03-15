<template>
    <div class="section left" :style="'background-color:' + pageData.bgColor">
        <div class="logo">
            <img :src="pageData.logo" alt="Logo" />
        </div>
        <div class="social">
            <a :href="'//' + pageData.website"
                ><i class="fas fa-sm fa-globe"></i> {{ pageData.website }}</a
            >
            <a :href="'https://linkedin.com/in' + pageData.linkedin"
                ><i class="fab fa-sm fa-linkedin"></i>
                {{ pageData.linkedin }}</a
            >
            <a :href="'https://instagram.com' + pageData.instagram"
                ><i class="fab fa-sm fa-instagram"></i>
                {{ pageData.instagram }}</a
            >
            <a :href="'https://facebook.com' + pageData.facebook"
                ><i class="fab fa-sm fa-facebook"></i>
                {{ pageData.facebook }}</a
            >
        </div>
    </div>
    <div
        class="section right"
        :style="'background-image:url(' + pageData.image + ')'"
    ></div>
    <div
        class="heading"
        :style="
            'background-color:' +
            pageData.headingBgColor +
            ';color:' +
            pageData.headingTextColor
        "
    >
        {{ pageData.heading }}
    </div>
</template>

<script>
export default {
    name: "ViewPage",

    data() {
        return {
            pageData: {},
            image: "",
        };
    },

    methods: {
        getData() {
            axios.get("/api/page-data").then((response) => {
                this.pageData = response.data.data;
            });
        },
        generateImage() {
            if (!this.pageData.image) {
                axios
                    .post("/api/generate-image", {
                        pageId: this.pageData.id,
                    })
                    .then((response) => {
                        this.pageData = response.data.data;
                    });
            }
        },
    },

    computed: {},
    mounted() {
        this.getData();
    },
    watch: {
        pageData: function (val) {
            this.generateImage();
        },
    },
};
</script>
