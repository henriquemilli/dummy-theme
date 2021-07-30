# Welcome coder
###### This dummy theme serves as a framework for our projects.

### Please do
1. Use functions and mixins, especially the prebuilt ones
2. Use our mobile first sass model ( base -> tablet -> desktop )
3. Use our per-scope model in the sass
4. Put mobile only or other specific sass rules in custom
5. Use only woff2 fonts, it's almost 2022 already
6. Use only webp, svg or avif images (check if hola already supports avif)
7. Either use es6 modules and webpack (so we end up with less files to load), or dinamically load javascript that is optional
8. Compile minified sass to .min.css

### Optional
1. Run 
        docker-compose up
2. Use the file __onsave.sh__ so your changes will be automagically pushed to your volume on every save
    sudo chmod +x onsave.sh
3. If you're coding with __visual studio code__ install the extensions and copy the following to __.vscode/settings.json__
        {
            "liveSassCompile.settings.formats": [
                {
                    "format": "compressed",
                    "extensionName": ".min.css",
                    "savePath": "/"
                },
                {
                    "format": "expanded",
                    "extensionName": ".css",
                    "savePath": "/"
                }
            ],

            "emeraldwalk.runonsave": {

                "commands": [
                    {
                        "match": ".*/dummy-theme/.*",
                        "cmd": "sh ~/Github/dummy-theme/onsave.sh"
                    }
                ]
            }

        }
4. Customize all the paths to your actual paths (__onsave.sh__ and __settings.json__)
5. Search and replace __dummy-theme__ with __new-theme__