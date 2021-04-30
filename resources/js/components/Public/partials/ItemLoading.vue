<template>
    <div :class="{'load-block-content': true, 'first-load-block-content': first}" >
        <div class="load-block-item">
            <div class="load-block big-load-block">
                <div class="left-part images-block recast">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="32" height="32" rx="2" fill="#EDEDEF"></rect>
                        <path d="M10 19L4 27H28L21 16L15 24L10 19Z" fill="#D8D8D8"></path>
                    </svg>
                </div>
                <div class="load-main-block">
                    <div class="middle-part">
                        <div class="top-block">
                            <div class="middle-gray-block bg height-item margin-bottom recast"></div>
                            <div class="short-gray-block bg height-item recast"></div>
                        </div>
                        <div class="bottom-block">
                            <div class="circle-gray-block bg margin-right recast"></div>
                            <div class="circle-gray-block bg margin-right recast"></div>
                            <div class="circle-gray-block bg margin-right recast"></div>
                            <div class="circle-gray-block bg recast"></div>
                        </div>
                    </div>
                    <div class="right-part">
                        <div class="right-left">
                            <div class="long-gray-block bg height-item margin-bottom recast"></div>
                            <div class="long-gray-block bg height-item margin-bottom recast"></div>
                            <div class="long-gray-block bg height-item margin-bottom recast"></div>
                            <div class="long-gray-block bg height-item margin-bottom recast"></div>
                            <div class="long-gray-block bg height-item margin-bottom recast"></div>
                            <div class="long-gray-block bg height-item"></div>
                        </div>
                        <div class="right-right">
                            <div class="rectangle-content">
                                <div class="rectangle-block bg recast"></div>
                            </div>
                            <div class="circle-content">
                                <div class="circle-gray-block bg recast"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ItemLoading",
    props: ['first']
}
</script>

<style scoped>

</style>
