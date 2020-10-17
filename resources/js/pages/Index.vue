<template>

    <div>

        <div class="card w-full md:w-1/2 mx-auto">

            <h2>
                Bingo
            </h2>

            <div class="card-body">
                <p>
                    Easily create public shareable bingo games with nearly unlimited players. Without bullshit.
                </p>
            </div>

            <div class="card-footer">

                <router-link :to="{ name: 'games.create.start' }" class="button button-blue">
                    Create game
                </router-link>

            </div>

        </div>

    </div>

</template>
