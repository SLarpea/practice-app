<script setup>
import { ref } from 'vue';
import { inject } from '@vue/runtime-core';
import { Head, router } from '@inertiajs/vue3';
import PageLoader from '@/Components/PageLoader.vue';
import NavBar from '@/Components/Navbar.vue';
import SideBar from '@/Components/Sidebar.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    title: String,
    module: String
});

const global = inject('globalVar');
const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};
</script>

<template>
    <div class="wrapper">
        <PageLoader :loading="global.isLoading" />
        <Head :title="title" />
        <NavBar />
        <SideBar :title="title" />

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="breadcrumb-wrapper col-sm-12 text-sm">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">{{ module }}</li>
                                <li class="breadcrumb-item active">{{ title }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <main>
                        <slot />
                    </main>
                </div>
            </section>
        </div>

        <Footer />
    </div>
</template>
