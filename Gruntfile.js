/* global module:false */
module.exports = function (grunt) {
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
    var mozjpeg = require('imagemin-mozjpeg');
    console.log(mozjpeg);

    grunt.initConfig({
        sass: {
            dist: {
                files: [{
                    expand: true,
                    cwd: '.src/sass',
                    src: ['**/*.scss'],
                    dest: '.src/css',
                    rename: function (dest, src) {
                        var folder = src.substring(0, src.lastIndexOf('/')),
                            filename = src.substring(src.lastIndexOf('/'), src.length);
                        filename = filename.substring(0, filename.lastIndexOf('.'));
                        return dest + '/' + folder + filename + '.css';
                    }
                }],
                options: {
                    sourcemap: true,
                    style: 'nested'
                }
            }
        },

        replace: {
            dist: {
                src: ['.src/css/material.min.css'],
                overwrite: true,
                replacements: [{
                    from: /[\t\r\n]+/g,
                    to: ''
                }, {
                    from: /<link rel="shortcut icon".*/g,
                    to: '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/><link rel="icon" href="favicon.ico" type="image/x-icon"/>'
                }]
            }

        },

        autoprefixer: {
            options: {
                browsers: ['last 3 versions', 'ie 8']
            },
            dist: {
                expand: true,
                flatten: true,
                src: '.src/css/*.css',
                dest: '.src/css/'
            }
        },

        cssmin: {
            dist: {
                expand: true,
                cwd: '.src/css/',
                src: ['*.css', '!*.min.css'],
                dest: '.src/css/',
                ext: '.min.css'
            }
        },

        favicons: {
            options: {
                html: '.src/logo/favicons.html',
                HTMLPrefix: '/icns/',
                precomposed: false,
                firefox: true,
                firefoxManifest: 'public/icns/material.webapp',
                appleTouchBackgroundColor: '#222222'
            },
            icons: {
                src: '.src/logo/m-logo.png',
                dest: 'public/icns/'
            }
        },

        copy: {
            favicon: {
                src: 'public/icns/favicon.ico',
                dest: 'public/favicon.ico'
            }
        },

        clean: {
            dist: ['.src/css/material.css', '.src/css/material.min.css'],
            favicon: ['public/favicon.ico'],
        },

        'string-replace': {
            dist: {
                files: {
                    'public/2018/index.html': '.src/html/2018.html',
                    'public/2018/archive.html': '.src/html/archive.html',
                    'public/2018/code-of-conduct.html': '.src/html/code-of-conduct.html',
                    'public/2018/site-notice.html': '.src/html/site-notice.html',
                    'public/2018/data-protection.html': '.src/html/data-protection.html',
                    'public/2018/slack-invite.php': '.src/html/slack-invite.php',
                },
                options: {
                    replacements: [
                        {
                            pattern: '<link href=".src/sass/material.min.css" rel="stylesheet"/>',
                            replacement: '<style><%= grunt.file.read(".src/css/material.min.css") %></style>'
                        },
                        {
                            pattern: '<!-- favicon -->',
                            replacement: '<%= grunt.file.read(".src/logo/favicons.html") %>'
                        }
                    ]
                }
            }
        },

        replace: {
            favicon: {
                src: ['public/icons/favicons.html'],
                overwrite: true,
                replacements: [{
                    from: /[\t\r\n]+/g,
                    to: ''
                }, {
                    from: /<link rel="shortcut icon".*/g,
                    to: '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/><link rel="icon" href="favicon.ico" type="image/x-icon"/>'
                }]
            }
        },

        htmlmin: {
            dist: {
                options: {
                    removeComments: true,
                    collapseWhitespace: true
                },
                files: {
                    'public/2018/index.html': 'public/2018/index.html',
                    'public/2018/archive.html': 'public/2018/archive.html',
                    'public/2018/code-of-conduct.html': 'public/2018/code-of-conduct.html',
                    'public/2018/site-notice.html': 'public/2018/site-notice.html',
                    'public/2018/data-protection.html': 'public/2018/data-protection.html',
                    'public/archive/index.html': 'public/2018/archive.html',
                }
            },
        },

        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 6,
                    svgoPlugins: [{ removeViewBox: false }]
                },
                files: [{
                    expand: true,
                    cwd: '.src/img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'public/2018/img/'
                }]
            }
        },

        watch: {
            sass: {
                files: '.src/sass/**/*.scss',
                tasks: ['css']
            },
            html: {
                files: '.src/html/**/*.{html,php}',
                tasks: ['html']
            },
            images: {
                files: '.src/img/**/*.{png,jpg,gif}',
                tasks: ['images']
            },
            grunt: {
                files: ['Gruntfile.js'],
                options: {
                    reload: true
                }
            }
        }
    });

    // Default task.
    grunt.registerTask('default', ['css']);
    grunt.registerTask('images', ['imagemin']);
    grunt.registerTask('css', ['clean', 'sass', 'autoprefixer', 'cssmin', 'html']);
    grunt.registerTask('html', ['string-replace', 'htmlmin']);
    grunt.registerTask('favicon', ['clean:favicon', 'favicons', 'copy:favicon', 'replace:favicon', 'html']);
};
