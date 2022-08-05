<div class="bg-white p-12 shadow-lg">

    Tailwind UI
    Components
    Templates
    New
    Documentation
    Sign in
    Get all-access →
    Category Filters
    Ecommerce
    Components
    With inline actions and expandable sidebar filters

    Requires JS

    <!--
  This example requires Tailwind CSS v2.0+
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <div class="bg-white">
        <div>
            <!--
      Mobile filter dialog

      Off-canvas filters for mobile, show/hide based on off-canvas filters state.
    -->
            <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
                <!--
        Off-canvas menu backdrop, show/hide based on off-canvas menu state.

        Entering: "transition-opacity ease-linear duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
                <div class="fixed inset-0 bg-black bg-opacity-25"></div>

                <div class="fixed inset-0 z-40 flex">
                    <!--
          Off-canvas menu, show/hide based on off-canvas menu state.

          Entering: "transition ease-in-out duration-300 transform"
            From: "translate-x-full"
            To: "translate-x-0"
          Leaving: "transition ease-in-out duration-300 transform"
            From: "translate-x-0"
            To: "translate-x-full"
        -->
                    <div
                        class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                            <button type="button"
                                class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                                <span class="sr-only">Close menu</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Filters -->
                        <form class="mt-4 border-t border-gray-200">
                            <h3 class="sr-only">Categories</h3>
                            <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                                <li>
                                    <a href="#" class="block px-2 py-3"> Totes </a>
                                </li>

                                <li>
                                    <a href="#" class="block px-2 py-3"> Backpacks </a>
                                </li>

                                <li>
                                    <a href="#" class="block px-2 py-3"> Travel Bags </a>
                                </li>

                                <li>
                                    <a href="#" class="block px-2 py-3"> Hip Bags </a>
                                </li>

                                <li>
                                    <a href="#" class="block px-2 py-3"> Laptop Sleeves </a>
                                </li>
                            </ul>

                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-mobile-0" aria-expanded="false">
                                        <span class="font-medium text-gray-900"> Color </span>
                                        <span class="ml-6 flex items-center">
                                            <!--
                      Expand icon, show/hide based on section open state.

                      Heroicon name: solid/plus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!--
                      Collapse icon, show/hide based on section open state.

                      Heroicon name: solid/minus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-0">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-0" name="color[]" value="white"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-0"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> White </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-1" name="color[]" value="beige"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-1"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> Beige </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-2" name="color[]" value="blue"
                                                type="checkbox" checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-2"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> Blue </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-3" name="color[]" value="brown"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-3"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> Brown </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-4" name="color[]" value="green"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-4"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> Green </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-5" name="color[]" value="purple"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-5"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> Purple </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-mobile-1" aria-expanded="false">
                                        <span class="font-medium text-gray-900"> Category </span>
                                        <span class="ml-6 flex items-center">
                                            <!--
                      Expand icon, show/hide based on section open state.

                      Heroicon name: solid/plus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!--
                      Collapse icon, show/hide based on section open state.

                      Heroicon name: solid/minus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-1">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-0" name="category[]"
                                                value="new-arrivals" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-0"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> New Arrivals </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-1" name="category[]" value="sale"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-1"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> Sale </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-2" name="category[]" value="travel"
                                                type="checkbox" checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-2"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> Travel </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-3" name="category[]"
                                                value="organization" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-3"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> Organization </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-4" name="category[]"
                                                value="accessories" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-4"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> Accessories </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-mobile-2" aria-expanded="false">
                                        <span class="font-medium text-gray-900"> Size </span>
                                        <span class="ml-6 flex items-center">
                                            <!--
                      Expand icon, show/hide based on section open state.

                      Heroicon name: solid/plus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!--
                      Collapse icon, show/hide based on section open state.

                      Heroicon name: solid/minus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-2">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-0" name="size[]" value="2l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-0"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> 2L </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-1" name="size[]" value="6l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-1"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> 6L </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-2" name="size[]" value="12l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-2"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> 12L </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-3" name="size[]" value="18l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-3"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> 18L </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-4" name="size[]" value="20l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-4"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> 20L </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-5" name="size[]" value="40l"
                                                type="checkbox" checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-5"
                                                class="ml-3 min-w-0 flex-1 text-gray-500"> 40L </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="relative z-10 flex items-baseline justify-between border-b border-gray-200 pt-24 pb-6">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">New Arrivals</h1>

                    <div class="flex items-center">
                        <div class="relative inline-block text-left"
                        x-id="['dropdown-button']"
                        x-data="{ 
                            open : false,
                            toggle(){
                                this.open = this.open ? this.close() : true
                            },
                            close(){
                                this.open = false
                            }
                        }">
                            <div>
                                <button type="button"
                                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                    id="menu-button" aria-expanded="false" aria-haspopup="true" 
                                    @click="toggle()"
                                    :aria-expanded="open"
                                    :aria-controls="$id('dropdown-buuton')">
                                    Sort
                                    <!-- Heroicon name: solid/chevron-down -->
                                    <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <div 
                            x-show="open"
                            :id="$id('dropdown-button')"
                            @click.outside="close()" 
                            style="display: none"
                            class="absolute right-0 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900"
                                        role="menuitem" tabindex="-1" id="menu-item-0"> Most Popular </a>

                                    <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                        tabindex="-1" id="menu-item-1"> Best Rating </a>

                                    <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                        tabindex="-1" id="menu-item-2"> Newest </a>

                                    <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                        tabindex="-1" id="menu-item-3"> Price: Low to High </a>

                                    <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                        tabindex="-1" id="menu-item-4"> Price: High to Low </a>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                            <span class="sr-only">View grid</span>
                            <!-- Heroicon name: solid/view-grid -->
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </button>
                        <button type="button"
                            class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                            <span class="sr-only">Filters</span>
                            <!-- Heroicon name: solid/filter -->
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <section aria-labelledby="products-heading" class="pt-6 pb-24">
                    <h2 id="products-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                        <!-- Filters -->
                        <form class="hidden lg:block">
                            <h3 class="sr-only">Categories</h3>
                            <ul role="list"
                                class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                                <li>
                                    <a href="#"> Totes </a>
                                </li>

                                <li>
                                    <a href="#"> Backpacks </a>
                                </li>

                                <li>
                                    <a href="#"> Travel Bags </a>
                                </li>

                                <li>
                                    <a href="#"> Hip Bags </a>
                                </li>

                                <li>
                                    <a href="#"> Laptop Sleeves </a>
                                </li>
                            </ul>

                            <div class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-0" aria-expanded="false">
                                        <span class="font-medium text-gray-900"> Color </span>
                                        <span class="ml-6 flex items-center">
                                            <!--
                      Expand icon, show/hide based on section open state.

                      Heroicon name: solid/plus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!--
                      Collapse icon, show/hide based on section open state.

                      Heroicon name: solid/minus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-0">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-color-0" name="color[]" value="white" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-color-0" class="ml-3 text-sm text-gray-600"> White
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-color-1" name="color[]" value="beige" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-color-1" class="ml-3 text-sm text-gray-600"> Beige
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-color-2" name="color[]" value="blue" type="checkbox"
                                                checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-color-2" class="ml-3 text-sm text-gray-600"> Blue
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-color-3" name="color[]" value="brown" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-color-3" class="ml-3 text-sm text-gray-600"> Brown
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-color-4" name="color[]" value="green" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-color-4" class="ml-3 text-sm text-gray-600"> Green
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-color-5" name="color[]" value="purple" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-color-5" class="ml-3 text-sm text-gray-600"> Purple
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-1" aria-expanded="false">
                                        <span class="font-medium text-gray-900"> Category </span>
                                        <span class="ml-6 flex items-center">
                                            <!--
                      Expand icon, show/hide based on section open state.

                      Heroicon name: solid/plus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!--
                      Collapse icon, show/hide based on section open state.

                      Heroicon name: solid/minus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-1">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-category-0" name="category[]" value="new-arrivals"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-0" class="ml-3 text-sm text-gray-600"> New
                                                Arrivals </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-category-1" name="category[]" value="sale"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-1" class="ml-3 text-sm text-gray-600"> Sale
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-category-2" name="category[]" value="travel"
                                                type="checkbox" checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-2" class="ml-3 text-sm text-gray-600"> Travel
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-category-3" name="category[]" value="organization"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-3" class="ml-3 text-sm text-gray-600">
                                                Organization </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-category-4" name="category[]" value="accessories"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-4" class="ml-3 text-sm text-gray-600">
                                                Accessories </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-2" aria-expanded="false">
                                        <span class="font-medium text-gray-900"> Size </span>
                                        <span class="ml-6 flex items-center">
                                            <!--
                      Expand icon, show/hide based on section open state.

                      Heroicon name: solid/plus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!--
                      Collapse icon, show/hide based on section open state.

                      Heroicon name: solid/minus-sm
                    -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-2">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-size-0" name="size[]" value="2l" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-size-0" class="ml-3 text-sm text-gray-600"> 2L </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-size-1" name="size[]" value="6l" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-size-1" class="ml-3 text-sm text-gray-600"> 6L </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-size-2" name="size[]" value="12l" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-size-2" class="ml-3 text-sm text-gray-600"> 12L
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-size-3" name="size[]" value="18l" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-size-3" class="ml-3 text-sm text-gray-600"> 18L
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-size-4" name="size[]" value="20l" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-size-4" class="ml-3 text-sm text-gray-600"> 20L
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-size-5" name="size[]" value="40l" type="checkbox"
                                                checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-size-5" class="ml-3 text-sm text-gray-600"> 40L
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Product grid -->
                        <div class="lg:col-span-3">
                            <!-- Replace with your content -->
                            <div class="h-96 rounded-lg border-4 border-dashed border-gray-200 lg:h-full"></div>
                            <!-- /End replace -->
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    With centered text and dropdown product filters

    PNG Preview
    Get the code →
    With dropdown product filters

    PNG Preview
    Get the code →
    With expandable product filter panel

    PNG Preview
    Get the code →
    Sidebar filters

    PNG Preview
    Get the code →

    © 2022 Tailwind Labs Inc. All rights reserved.
    Privacy policy
    Changelog

</div>
