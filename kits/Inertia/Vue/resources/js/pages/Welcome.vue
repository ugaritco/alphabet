<script setup lang="ts">
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import { dashboard, login } from '@/routes';
/* @chisel-registration */
import { register } from '@/routes';
/* @end-chisel-registration */
import { useAppearance } from '@/composables/useAppearance';
import { Moon, Sun } from '@lucide/vue';

const { resolvedAppearance, updateAppearance } = useAppearance();

const toggleTheme = () => {
    updateAppearance(resolvedAppearance.value === 'dark' ? 'light' : 'dark');
};

const copiedCommand = ref(false);
const cliCommand = 'php scribe serve';

const copyToClipboard = () => {
    navigator.clipboard.writeText(cliCommand);
    copiedCommand.value = true;
    setTimeout(() => {
        copiedCommand.value = false;
    }, 2000);
};
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <div
        class="flex min-h-screen flex-col items-center justify-between bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a] dark:text-[#EDEDEC]"
    >
        <!-- Header -->
        <header
            class="mb-6 w-full max-w-[335px] text-sm not-has-[nav]:hidden lg:max-w-4xl"
        >
            <nav class="flex items-center justify-end gap-3 sm:gap-4">
                <Link
                    v-if="$page.props.auth?.user"
                    :href="dashboard()"
                    class="inline-flex h-[34px] items-center justify-center rounded-sm border border-[#19140035] px-5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="login()"
                        class="inline-flex h-[34px] items-center justify-center rounded-sm border border-transparent px-5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                    >
                        Log in
                    </Link>
                    <!-- @chisel-registration -->
                    <Link
                        :href="register()"
                        class="inline-flex h-[34px] items-center justify-center rounded-sm border border-[#19140035] px-5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    >
                        Register
                    </Link>
                    <!-- @end-chisel-registration -->
                </template>

                <!-- Theme Toggle Button (Icon, Exact Same Height h-[34px]) -->
                <button
                    @click="toggleTheme"
                    type="button"
                    class="inline-flex h-[34px] items-center justify-center rounded-sm border border-[#19140035] px-3 text-[#1b1b18] transition hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    :title="resolvedAppearance === 'dark' ? 'Switch to light mode' : 'Switch to dark mode'"
                >
                    <Sun v-if="resolvedAppearance === 'dark'" class="h-4 w-4 text-amber-400" />
                    <Moon v-else class="h-4 w-4 text-neutral-600 dark:text-neutral-300" />
                </button>
            </nav>
        </header>

        <!-- Main Card (No Icons, Philosophy Narrative in English) -->
        <main
            class="flex w-full max-w-[335px] flex-col items-center justify-center rounded-lg border border-[#1914001a] bg-white p-8 text-center shadow-sm lg:max-w-4xl lg:p-14 dark:border-[#3E3E3A] dark:bg-[#161615]"
        >
            <!-- Title Only -->
            <h1 class="text-3xl font-black tracking-tight text-[#1b1b18] sm:text-5xl dark:text-white">
                UGARIT
            </h1>

            <!-- Ugarit Philosophy Narrative: Focus on Business Logic & Sovereignty (English) -->
            <p class="mt-4 max-w-xl text-center text-sm font-medium leading-relaxed text-[#706f6c] sm:text-base dark:text-[#A1A09A]">
                A sovereign software alphabet liberating developers from infrastructure overhead, empowering complete focus on core business logic with absolute technical independence.
            </p>

            <!-- Quick Action Buttons -->
            <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                <a
                    href="https://ugarit.com/docs"
                    target="_blank"
                    class="inline-flex h-10 w-full sm:w-auto items-center justify-center rounded-sm border border-black bg-[#1b1b18] px-6 text-xs font-semibold text-white shadow-sm hover:border-black hover:bg-black dark:border-[#eeeeec] dark:bg-[#eeeeec] dark:text-[#1C1C1A] dark:hover:border-white dark:hover:bg-white"
                >
                    Documentation
                </a>

                <!-- Quick Terminal Copy Pill -->
                <div class="flex h-10 w-full sm:w-auto items-center justify-between gap-3 rounded-sm border border-[#19140025] bg-[#FDFDFC] px-4 font-mono text-xs text-[#1b1b18] dark:border-[#3E3E3A] dark:bg-[#0a0a0a] dark:text-[#EDEDEC]">
                    <span>{{ cliCommand }}</span>
                    <button
                        @click="copyToClipboard"
                        class="text-[#706f6c] hover:text-black dark:hover:text-white transition text-xs font-sans font-medium"
                        title="Copy command"
                    >
                        {{ copiedCommand ? 'Copied' : 'Copy' }}
                    </button>
                </div>
            </div>
        </main>

        <!-- 3 Cards Below Matching Big Card Style -->
        <div class="mt-4 grid w-full max-w-[335px] grid-cols-1 gap-4 sm:grid-cols-3 lg:max-w-4xl">
            <a
                href="https://ugarit.com/docs"
                target="_blank"
                class="group flex flex-col justify-center rounded-lg border border-[#1914001a] bg-white p-5 text-left shadow-sm transition hover:border-[#1915014a] dark:border-[#3E3E3A] dark:bg-[#161615] dark:hover:border-[#62605b]"
            >
                <div class="font-semibold text-sm text-[#1b1b18] group-hover:text-[#FF3B30] dark:text-white dark:group-hover:text-[#FF4D42] transition">
                    Documentation
                </div>
                <div class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]">
                    Guides & API Reference
                </div>
            </a>

            <a
                href="https://bootcamp.ugarit.com"
                target="_blank"
                class="group flex flex-col justify-center rounded-lg border border-[#1914001a] bg-white p-5 text-left shadow-sm transition hover:border-[#1915014a] dark:border-[#3E3E3A] dark:bg-[#161615] dark:hover:border-[#62605b]"
            >
                <div class="font-semibold text-sm text-[#1b1b18] group-hover:text-[#FF3B30] dark:text-white dark:group-hover:text-[#FF4D42] transition">
                    Bootcamp
                </div>
                <div class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]">
                    Video Tutorials & Walkthroughs
                </div>
            </a>

            <a
                href="https://cloud.ugarit.com"
                target="_blank"
                class="group flex flex-col justify-center rounded-lg border border-[#1914001a] bg-white p-5 text-left shadow-sm transition hover:border-[#1915014a] dark:border-[#3E3E3A] dark:bg-[#161615] dark:hover:border-[#62605b]"
            >
                <div class="font-semibold text-sm text-[#1b1b18] group-hover:text-[#FF3B30] dark:text-white dark:group-hover:text-[#FF4D42] transition">
                    Cloud
                </div>
                <div class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]">
                    Deploy Anywhere
                </div>
            </a>
        </div>

        <!-- Footer -->
        <footer class="mt-6 flex w-full max-w-[335px] items-center justify-between text-xs text-[#706f6c] lg:max-w-4xl dark:text-[#A1A09A]">
            <div>
                <span>Ugarit Framework . v1.00.00</span>
            </div>
            <div class="font-mono text-[11px]">
                <span>Heritage Core • PHP 8.3+</span>
            </div>
        </footer>
    </div>
</template>
