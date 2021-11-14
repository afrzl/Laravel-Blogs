<template>
    <blog-layout title="Dashboard">
        <article
            v-for="post in posts"
            :key="post.id"
            class="flex flex-col shadow my-4"
        >
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img
                    src="https://source.unsplash.com/collection/1346951/1000x500?sig=1"
                />
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <div class="text-blue-700 text-sm font-bold uppercase">
                    <template v-for="(category, index) in post.categories" :key="category.slug">
                        <template v-if="index > 0">, </template>
                        <inertia-link :href="`/blog/category/${category.slug}`">{{ category.name }}</inertia-link>
                    </template>
                </div>
                <inertia-link
                    :href="`/blog/${post.slug}`"
                    class="text-3xl font-bold hover:text-gray-700 pb-4"
                    >{{ post.title }}</inertia-link
                >
                <p class="text-sm pb-3">
                    By
                    <inertia-link :href="`/blog/user/${post.user.id}`" class="font-semibold hover:text-gray-800">{{
                        post.user.name
                    }}</inertia-link
                    >, Published on {{ post.published_at }}
                </p>
                <inertia-link :href="`/blog/${post.slug}`" class="pb-6">{{ post.body }}</inertia-link>
                <inertia-link :href="`/blog/${post.slug}`" class="uppercase text-gray-800 hover:text-black"
                    >Continue Reading <i class="fas fa-arrow-right"></i
                ></inertia-link>
            </div>
        </article>
    </blog-layout>
</template>

<script>
import { defineComponent } from "vue";
import BlogLayout from "./../../Layouts/BlogLayout.vue";

export default defineComponent({
    props: ["posts"],
    components: {
        BlogLayout,
    },
});
</script>
