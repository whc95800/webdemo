module.exports = {
    devServer: {
        https: false,
        proxy: {
            "/api": {
                target: "http://re100.info/api",
                changeOrigin: true,
                pathRewrite: {
                    "/api": "",
                },
            },
            "/uploads": {
                target: "http://re100.info/uploads",
                changeOrigin: true,
                pathRewrite: {
                    "/uploads": "",
                },
            },
        },
    },
}
