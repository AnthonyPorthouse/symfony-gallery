const path = require('path');

module.exports = {
    entry: 'css/site.css',
    output: {
        filename: 'site.css',
        path: path.resolve(__dirname, '../src/public/css'),
    },

    module: {
        rules: [
            {
                test: /\.css$/,
                exclude: /node_modules/,
                use: [
                    {
                        loader: 'style-loader',
                    },
                    {
                        loader: 'css-loader',
                        options: {
                            importLoaders: 1,
                        }
                    },
                    {
                        loader: 'postcss-loader'
                    }
                ]
            }
        ]
    }
};
