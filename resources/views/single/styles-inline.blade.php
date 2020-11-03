<style>
    @media print {
        .single-load-content {
            display: none;
        }
        a.inquiry {
            background-color: #6BB63F;
            -webkit-print-color-adjust: exact;
        }
        footer {
            display: none;
        }
        header {
            display: none;
        }
        .single-content .sidebar .sidebar-top {
            display: none !important;
        }
        .single-content .sidebar .sidebar-middle {
            display: none !important;
        }
        .single-content .sidebar .sidebar-bottom {
            display: none !important;
        }
        img {
            max-width: 100% !important;
        }
        ul, img {
            page-break-inside: avoid;
        }
        #print-none {
            position: absolute;
            width: 0;
            height: 0;
            overflow: hidden;
        }
        body {
            margin: 0;
        }
        .single-content {
            padding: 0 !important;
            display: block !important;
        }
    }
</style>
