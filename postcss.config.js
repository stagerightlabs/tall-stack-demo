module.exports = {
  plugins:
    process.env.NODE_ENV === 'production'
      ? [
          require('postcss-import'),
          require('tailwindcss'),
          require('autoprefixer'),
          require('cssnano')({
            preset: 'default'
          })
        ]
      : [
          require('postcss-import'),
          require('tailwindcss'),
          require('autoprefixer')
        ]
}
