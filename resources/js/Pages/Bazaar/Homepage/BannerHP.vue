<script>
import { usePage } from '@inertiajs/vue3';

export default {
    name: "BannerHP",
    data() {
        return {
            categories: [],
            activeCategory: null,
        };
    },
    mounted() {
        const categories = usePage().props.categories;
        this.categories = categories;
    },
    methods: {
        showSubCategory(id) {
            this.activeCategory = this.activeCategory === id ? null : id;
        },
        openCategory(id) {
            console.log(`Navigate to category with ID: ${id}`);
        },
        openCategory(id) {
            console.log('Seacrh by ' + id);
        }
    },
}
</script>

<template>

    <!-- Header bottom-->
    <div class="header-bottom hidden-compact">
        <div class="container">
            <div class="header-bottom-inner">
                <div class="row">
                    <div class="header-bottom-left menu-vertical col-md-3 col-sm-3 col-xs-3">
                        <div class="megamenu-style-dev">
                            <div class="responsive">
                                <div class="so-vertical-menu no-gutter">
                                    <nav class="navbar-default">
                                        <div class="container-megamenu container vertical">
                                            <div id="menuHeading">
                                                <div class="megamenuToogle-wrapper">
                                                    <div class="megamenuToogle-pattern">
                                                        <div class="container">
                                                            <div>
                                                                <span></span>
                                                                <span></span>
                                                                <span></span>
                                                            </div>
                                                            <span class="title-mega">
                                                                All Categories
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="navbar-header">
                                                <span class="title-navbar hidden-lg hidden-md"> All Categories </span>
                                                <button type="button" id="show-verticalmenu" data-toggle="collapse"
                                                    class="navbar-toggle">
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                            </div>
                                            <div class="vertical-wrapper">
                                                <span id="remove-verticalmenu" class="fa fa-times"></span>
                                                <div class="megamenu-pattern">
                                                    <div class="container">
                                                        <ul class="megamenu" data-transition="slide"
                                                            data-animationtime="300">
                                                            <template v-for="(category, id) in categories" :key="id">
                                                                <li class="item-vertical item-style3 with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a href="javascript:void(0);" class="clearfix"
                                                                        @click="showSubCategory(category.id)">
                                                                        <span>
                                                                            <strong>
                                                                                <i class="icon icon1"></i>
                                                                                {{ category.category_name }}
                                                                            </strong>
                                                                        </span>
                                                                        <b class="fa fa-caret-right"></b>
                                                                        <!-- <b :class="{'fa fa-caret-down': activeCategory === category.id, 'fa fa-caret-right': activeCategory !== category.id}"></b> -->
                                                                    </a>
                                                                    <div v-if="activeCategory === category.id" class="bg-white ml-[100%] top-8 absolute p-10"
                                                                        style="width:650px">
                                                                        <div class="content">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="categories">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-sm-4 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <template
                                                                                                            v-if="category.sub_categories && category.sub_categories.length">
                                                                                                            <li v-for="subCategory in category.sub_categories"
                                                                                                                :key="subCategory.id">
                                                                                                                <a href="javascript:void(0);"
                                                                                                                    @click="openCategory(subCategory.id)">
                                                                                                                    {{
                                                                                                                    subCategory.category_name
                                                                                                                    }}
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </template>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </template>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col_anla  slider-right">
                        <div class="row row_ci4f  ">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_dg1b block block_1">
                                <div class="module sohomepage-slider so-homeslider-ltr">
                                    <div class="modcontent">
                                        <div id="sohomepage-slider1">
                                            <div
                                                class="so-homeslider yt-content-slider full_slider owl-carousel owl-theme">
                                                <div class="item">
                                                    <img class="responsive"
                                                        src="theme/image/homepage/slider-1.jpg"
                                                        alt="slide 1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_hmsd block block_2">
                                <div class="home1-banner-1 clearfix">
                                    <div class="item-1 col-lg-6 col-md-6 col-sm-6 banners">
                                        <div>
                                            <a title="Static Image" href="#">
                                                <img src="theme/image/homepage/slider-2.jpg"
                                                    alt="Static Image">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-2 col-lg-6 col-md-6 col-sm-6 banners">
                                        <div>
                                            <a title="Static Image" href="#">
                                                <img src="theme/image/homepage/slider-3.jpg"
                                                    alt="Static Image">
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>