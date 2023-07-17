<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="">
                <img src="logo.svg" alt="Bulma: Free, open source, and modern CSS framework based on Flexbox" width="112"
                    height="28">
            </a>


        </div>
    </nav>
</template>

<script>
import { PROJECT_NAME } from '../constants.js';

export default {
    data() {
        return {
            projectName: PROJECT_NAME
        };
    }
}

</script>



