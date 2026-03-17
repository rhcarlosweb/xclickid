module.exports = {
  proxy: "https://xclickid.ddev.site",
  open: "local",
  files: [
    "assets/css/main.css",
    "index.php",
    "assets/js/main.js"
  ],
  injectChanges: true,
  reloadDelay: 100
};
