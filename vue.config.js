const path = require("path");

module.exports = {
  transpileDependencies: true,
  chainWebpack: (config) => {
    config.entry("app").clear().add("./frontend/main.js").end();
    config.resolve.alias.set("@", path.join(__dirname, "./frontend"));
  },
};
