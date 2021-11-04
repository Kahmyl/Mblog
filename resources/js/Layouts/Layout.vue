<template>
    <div>
        <Head :title="title" />
        <jet-banner />

        <div class="min-h-screen bg-gray-100">
            <nav v-if="$page.props.user " class="bg-black text-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <Link  :href="route('dashboard')" class="h-10 ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-md text-base font-medium text-white bg-white hover:bg-whitesmoke-700">
                                    <img class=" object-cover" src="@/icons/blogo.jpg"  />
                                </Link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900" :href="route('dashboard')" :active="route().current('dashboard')">
                                   Home
                                </jet-nav-link>
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900" :href="route('entertain')" :active="route().current('entertain')">
                                   Entertainment
                                </jet-nav-link>
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900" :href="route('art')" :active="route().current('art')">
                                  Art
                                </jet-nav-link>
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900" :href="route('sport')" :active="route().current('sport')">
                                  Sport
                                </jet-nav-link>
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900" :href="route('post-blog')" :active="route().current('post-blog')">
                                  Add Blogs
                                </jet-nav-link>
                            </div>
                        </div>
                        <div  class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div  class="ml-3 relative">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                                {{ $page.props.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <jet-dropdown-link :href="route('profile.show')">
                                            Profile
                                        </jet-dropdown-link>


                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <jet-dropdown-link as="button">
                                                Log Out
                                            </jet-dropdown-link>
                                        </form>
                                    </template>
                                </jet-dropdown>
                            </div>
                        </div>
                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="block justify-center items-center">
                        <div class="pt-2 pb-3 space-y-1">
                            <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                               Home
                            </jet-nav-link>
                        </div>
                        <div class="pt-2 pb-3 space-y-1">
                             <jet-nav-link :href="route('entertain')" :active="route().current('entertain')">
                                Entertainment
                             </jet-nav-link>
                        </div>
                        <div class="pt-2 pb-3 space-y-1">
                            <jet-nav-link :href="route('art')" :active="route().current('art')">
                              Art
                            </jet-nav-link>
                        </div>
                        <div class="pt-2 pb-3 space-y-1">
                            <jet-nav-link :href="route('sport')" :active="route().current('sport')">
                              Sport
                            </jet-nav-link>
                        </div>
                        <div class="pt-2 pb-3 space-y-1">
                            <jet-nav-link :href="route('post-blog')" :active="route().current('post-blog')">
                              Add Blogs
                            </jet-nav-link>
                        </div>
                    </div>

                   
                    
                    
                    

                    <!-- Responsive Settings Options -->
                    <div class="block justify-center items-center pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </jet-responsive-nav-link>

                            <jet-responsive-nav-link :href="route('api-tokens.index')" :active="route().current('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                API Tokens
                            </jet-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    Log Out
                                </jet-responsive-nav-link>
                            </form>

                        </div>
                    </div>
                </div>
            </nav>
            <nav v-else class="bg-black text-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <Link  :href="route('dashboard')" class="h-10 ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-md text-base font-medium text-white bg-white hover:bg-whitesmoke-700">
                                    <img class=" object-cover" src="@/icons/blogo.jpg"  />
                                </Link>
                            </div>
                            <div class="hidden text-white space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-white-500 hover:text-white-900" :href="route('root')" :active="route().current('root')">
                                   Home
                                </jet-nav-link>
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-white-500 hover:text-white-900" :href="route('entertain')" :active="route().current('entertain')">
                                   Entertainment
                                </jet-nav-link>
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-white-500 hover:text-white-900" :href="route('art')" :active="route().current('art')">
                                  Art
                                </jet-nav-link>
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-white-500 hover:text-white-900" :href="route('sport')" :active="route().current('sport')">
                                  Sport
                                </jet-nav-link>
                                <jet-nav-link class="whitespace-nowrap text-base font-medium text-white-500 hover:text-white-900" :href="route('post-blog')" :active="route().current('post-blog')">
                                  Add Blogs
                                </jet-nav-link>
                            </div>
                        </div>
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <Link :href="route('login')" class="whitespace-nowrap text-base font-medium text-white-500 hover:text-white-900">
                                Log in
                            </Link>
            
                            <Link  :href="route('register')" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Register
                            </Link>
                        </div>
                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="block justify-center items-center">
                        <div class="pt-2 pb-3 space-y-1">
                            <jet-nav-link :href="route('root')" :active="route().current('root')">
                               Home
                            </jet-nav-link>
                        </div>
                        <div class="pt-2 pb-3 space-y-1">
                             <jet-nav-link :href="route('entertain')" :active="route().current('entertain')">
                                Entertainment
                             </jet-nav-link>
                        </div>
                        <div class="pt-2 pb-3 space-y-1">
                            <jet-nav-link :href="route('art')" :active="route().current('art')">
                              Art
                            </jet-nav-link>
                        </div>
                        <div class="pt-2 pb-3 space-y-1">
                            <jet-nav-link :href="route('sport')" :active="route().current('sport')">
                              Sport
                            </jet-nav-link>
                        </div>
                        <div class="pt-2 pb-3 space-y-1">
                            <jet-nav-link :href="route('post-blog')" :active="route().current('post-blog')">
                              Add Blogs
                            </jet-nav-link>
                        </div>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="block justify-center pt-4 pb-1 border-t border-gray-200">
                        <Link :href="route('login')" class="text-sm text-gray-700 underline">
                            Log in
                        </Link>
        
                        <Link  :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                            Register
                        </Link>
                    </div>
                </div>
            </nav>
            
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header>
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>

import { defineComponent } from 'vue'
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetBanner from '@/Jetstream/Banner.vue'
import JetDropdown from '@/Jetstream/Dropdown.vue'
import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Logo from '@/icons/blogo.jpg'

export default defineComponent({
        props: {
            title: String,
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        },

        components: {
            Head,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Link,
            Logo,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    })
</script>
