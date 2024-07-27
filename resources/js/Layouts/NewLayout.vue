<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import NavBar from '@/Components/Navbar.vue';
import SideBar from '@/Components/Sidebar.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    title: String,
    module: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div class="wrapper">
        <div
            class="preloader flex-column justify-content-center align-items-center"
        >
            <div class="load">
                <hr/><hr/><hr/><hr/>
            </div>
        </div>
        <Head :title="title" />

        <NavBar />

        <SideBar :title="title" />

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">{{ module }}</li>
                                <li class="breadcrumb-item active">{{ title }}</li>
                            </ol>
                        </div><!-- /.col -->
                        
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
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
