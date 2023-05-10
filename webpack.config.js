import path from "path";
import { fileURLToPath } from "url";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

export let webpackConfig = {
  entry: "./src/js/main.js",
  mode: "development",
  output: {
    filename: "main.js",
    path: `${__dirname}/dist/js`,
  },
  resolve: {
    fallback: {
      fs: false,
    },
  },
};
