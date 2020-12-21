<template>
    <div>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Award Management</a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="homeActive ? 'active': ''"
                                    aria-current="page"
                                    href="/"
                                    >Home</a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="eventActive ? 'active' : ''" href="/events">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="mobileActive ? 'active' : ''" href="/mobiles">Mobiles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="winnerActive ? 'active' : ''" href="/winners">Winners</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container mt-4">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
export default {
    data () {
        return {
            homeActive: false,
            eventActive: false,
            mobileActive: false,
            winnerActive: false,
        }
    },
    created () {
        switch (this.$route.name) {
            case "home":
                this.homeActive = true;
                break;
            case "events":
            case "events.info":
                this.eventActive = true;
                break;
            case "mobiles":
                this.mobileActive = true;
                break;
            case "winners":
                this.winnerActive = true;
                break;
        }
    }
};
</script>
