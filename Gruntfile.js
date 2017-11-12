
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      scripts: {
        files: ['sass/style.css'],
      },
    },
    combine_mq: {
      options: {},
      src: 'sass/style.css',
      dest: 'dist/'
    }
  });
  //grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-combine-mq');

  // Default task(s).
  grunt.registerTask('default', ['combine_mq']);
};
