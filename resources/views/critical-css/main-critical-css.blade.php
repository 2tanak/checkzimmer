<style>
    body{
        font-family: "Segoe UI", "Arial", sans-serif;
        height: calc(100vh - 97px);
    }
    #app {
        height: 100%;
    }
    a {
        color: #545769;
    }
    header * {
        opacity: 0;
    }
    .modal-overlay {
        opacity: 0;
    }
    .modal-overlay * {
        opacity: 0;
    }
    .background-image-block * {
        opacity: 0;
    }
    .plans-section.city-section .city-content * {
        opacity: 0;
    }
    .nothing-found-section * {
        opacity: 0;
    }
    .single-container * {
        opacity: 0;
    }
    .plans-section .price-block-item .name-tariff {
        padding: 4px 10px;
        font-weight: 500;
        font-size: 11px;
        line-height: 130%;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        color: #FFFFFF;
        text-shadow: 0 1px 0 rgb(0 0 0 / 16%);
        border-radius: 100px;
        margin-bottom: 22px;
        display: inline-block;
        transition: all 0.2s;
        background: #9FA0A4;
    }
    .plans-section .price-block-item .max-price {
        font-weight: 600;
    }
    .plans-section.city-section a.plus-city {
        height: 230px;
        width: 23.4%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column-reverse;
        text-decoration: none;
        position: relative;
        margin-right: 2.1%;
        border-radius: 12px;
        transition: all 0.2s;
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
    }
    .plans-section.city-section .price-block {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 50px;
        align-items: inherit;
        position: relative;
        z-index: 10;
    }
    .plans-section.city-section a.plus-city:last-of-type {
        margin-right: 0;
    }

</style>
