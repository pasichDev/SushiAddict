<template>
    <section class="section ">
        <div class="columns is-vcentered ">
            <div class="column is-8">
                <h1 class="title is-size-3 my-header-title has-text-danger">{{ projectName }}</h1>
                <h2 class="subtitle is-size-5 my-header-subtitle">
                    {{ decription }}
                </h2>
            </div>
            <div class="column">

            </div>
        </div>
    </section>
</template>

<script>
import { PROJECT_NAME, PROJECT_DESCRIPTION } from '../constants.js';

export default {
    data() {
        return {
            projectName: PROJECT_NAME,
            decription: PROJECT_DESCRIPTION
        };
    }
}

</script>



