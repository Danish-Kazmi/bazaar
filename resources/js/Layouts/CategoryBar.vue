<script>
import { usePage } from '@inertiajs/vue3';

export default {
    name: 'CategoryBar',
    data() {
        return {
            categories: [],
        }
    },
    mounted() {
        const categories = usePage().props.categories;
        this.categories = categories;
    },
}
</script>

<template>
    <div class="header-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-1 col-xs-3 header-menu">
                    <div class="megamenu-style-dev megamenu-dev">
                        <div class="responsive">
                            <nav class="navbar-default">
                                <div class="container-megamenu horizontal">
                                    <div class="navbar-header">
                                        <button type="button" id="show-megamenu" data-toggle="collapse"
                                            class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="megamenu-wrapper">
                                        <span id="remove-megamenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container">
                                                <ul class="megamenu" data-transition="slide" data-animationtime="500">
                                                    <li class="full-width menu-home with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <a :href="route('home')" class="clearfix">
                                                            <strong>
                                                                Home
                                                            </strong>
                                                        </a>

                                                    </li>
                                                    <li class="full-width option2 with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <a :href="route('products')" class="clearfix">
                                                            <strong>
                                                                Hot Deal
                                                            </strong>

                                                        </a>
                                                    </li>
                                                    <li class="item-style1 content-full with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <a :href="route('about_us')" class="clearfix">
                                                            <strong>
                                                                About Us
                                                            </strong>

                                                        </a>
                                                    </li>
                                                    <li class="item-style2 content-full feafute with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <a :href="route('contact_us')" class="clearfix">
                                                            <strong>
                                                                Contact Us
                                                            </strong>

                                                        </a>
                                                    </li>
                                                    <li class="deal-h5 hidden">
                                                        <p class="close-menu"></p>
                                                        <a href="#" class="clearfix">
                                                            <strong>
                                                                <img src="http://bazaar.test/theme/image/catalog/demo/menu/hot-block.png"
                                                                    alt="">Buy This Theme!
                                                            </strong>
                                                        </a>
                                                    </li>
                                                    <li class="deal-h5 hidden">
                                                        <p class="close-menu"></p>
                                                        <a href="#" class="clearfix">
                                                            <strong>
                                                                Today Deals
                                                            </strong>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-11 col-xs-9 header-search">
                    <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                        <form method="GET" action="index.php">
                            <div id="search0" class="search input-group form-group">
                                <div class="select_category filter_type  icon-select">
                                    <select class="no-border" name="category_id">
                                        <option value="">All Categories </option>
                                        <template v-for="(category, id) in categories" :key="id">
                                            <option :value="category.id">
                                                {{ category.category_name }}
                                            </option>
                                            <template v-if="category.sub_categories && category.sub_categories.length">
                                                <template v-for="subCategory in category.sub_categories" :key="subCategory.id">
                                                <option :value="subCategory.id">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ subCategory.category_name }}
                                                </option>
                                                </template>
                                            </template>
                                        </template>
                                    </select>
                                </div>
                                <input class="autosearch-input form-control" type="text" value="" size="50"
                                    autocomplete="off" placeholder="Search" name="search">

                                <span class="input-group-btn">
                                    <button type="submit" class="button-search btn btn-default btn-lg"
                                        name="submit_search"><i class="fa fa-search"></i><span
                                            class="hidden">Search</span></button>
                                </span>
                            </div>
                            <input type="hidden" name="route" value="product/search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>