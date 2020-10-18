<template>

    <div class="bg-gray-900 text-white shadow-lg">

        <div class="container px-4 mx-auto h-12 flex justify-between items-stretch text-gray-200">

            <div class="flex align-items-stretch">

                <router-link :to="{ name: 'index' }" class="flex items-center">
                    Trash Bingo
                </router-link>

            </div>

            <div class="flex align-items-stretch">

                <router-link :to="{ name: 'games.create.start' }" class="flex items-center">
                    Create Game
                </router-link>

            </div>

        </div>

    </div>

</template>
