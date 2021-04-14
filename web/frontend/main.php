<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-language" content="zh-CN" />
        <meta name="theme-color" content="#2d3943" />

        <link rel="stylesheet" href="//fonts.font.im/css?family=Play:400,700">
        <link href="https://fonts.font.im/css?family=Roboto+Mono:300,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet" />

        <title>TLogs - 上传, 分享 & 分析您的 Minecraft 服务器日志</title>

        <base href="/frontend/" />

        <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.2.0/css/fontawesome.min.css" />
        <link rel="stylesheet" href="css/btn.css" />
        <link rel="stylesheet" href="css/mclogs.css" />
        <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

        <meta name="description" content="轻松粘贴您的Minecraft服务器日志，以共享和分析它们。">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-43611107-4"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments)};
            gtag('js', new Date());

            gtag('config', 'UA-43611107-4', { 'anonymize_ip': true });
        </script>
    </head>
    <body>
        <header class="row navigation">
            <div class="row-inner">
                <a href="/" class="logo">
                    <img src="img/logo.png" />
                </a>
                <div class="menu">
                    <a class="menu-item" href="/#info">
                        <i class="fa fa-info-circle"></i> 概览
                    </a>
                    <a class="menu-item" href="/#plugin">
                        <i class="fa fa-database"></i> 插件
                    </a>
                    <a class="menu-item" href="/#mod">
                        <i class="fa fa-puzzle-piece"></i> Mod
                    </a>
                    <a class="menu-item" href="/#api">
                        <i class="fa fa-code"></i> API
                    </a>
                    <a class="menu-social btn btn-black btn-notext btn-large btn-no-margin" href="https://github.com/aternosorg/mclogs" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </div>
            </div>
        </header>
        <div class="row dark title">
            <div class="row-inner">
                <h1 class="title-container">
                    <span class="title-verb">上传</span> 您的 Minecraft 服务器日志。
                </h1>
            </div>
        </div>
        <div class="row dark paste">
            <div class="row-inner">
                <div class="paste-box">
                    <div class="paste-header">
                        <div class="paste-header-text">
                            在这里粘贴您的日志。
                        </div>
                        <div class="paste-save btn btn-green btn-no-margin">
                            <i class="fa fa-save"></i> 上传
                        </div>
                    </div>
                    <div class="paste-body">
                        <textarea id="paste" autocomplete="off" spellcheck="false"></textarea>
                    </div>
                    <div class="paste-footer">
                        <div class="paste-save btn btn-green btn-no-margin">
                            <i class="fa fa-save"></i> 上传
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row info" id="info">
            <div class="row-inner">
                <div class="info-item info-blue">
                    <div class="info-icon">
                        <i class="fa fa-clone"></i>
                    </div>
                    <div class="info-details">
                        <div class="info-title">
                            粘贴
                        </div>
                        <div class="info-text">
                            轻松发放您的 Minecraft 服务器日志 文件至任何地方。一些关键的信息将被脱敏处理（比如说IP地址）。
                        </div>
                    </div>
                </div>
                <div class="info-item info-green">
                    <div class="info-icon">
                        <i class="fa fa-share-alt"></i>
                    </div>
                    <div class="info-details">
                        <div class="info-title">
                            分享
                        </div>
                        <div class="info-text">
                            使用您个人的短链接来分享您的 Minecraft 服务器日志 给任何您想分发的人，让他们与您一起解决遇到的问题。
                        </div>
                    </div>
                </div>
                <div class="info-item info-red">
                    <div class="info-icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="info-details">
                        <div class="info-title">
                            分析
                        </div>
                        <div class="info-text">
                            通过智能语法高亮和主动分析来帮您发现 Minecraft 服务器日志 中存在的问题。
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row dark plugin" id="plugin">
            <div class="row-inner">
                <div class="article left">
                    <div class="article-icon">
                        <i class="fa fa-database"></i>
                    </div>
                    <div class="article-info">
                        <div class="article-title">
                            使用mclo.gs提供的插件。
                        </div>
                        <div class="article-text">
                                通过mclogs提供的插件，您可以通过一个简单的命令直接从服务器上共享Minecraft服务器日志。
                            使用权限与其他团队成员共享信息并解决问题。
                                通过该插件，您甚至有可能导出诸如崩溃后等旧的服务器日志文件。关键信息（如IP地址）将自动
                            隐藏，以确保安全和隐私。
                        </div>
                        <div class="article-buttons">
                            <a href="https://dev.bukkit.org/projects/mclogs" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-download"></i> dev.bukkit.org
                            </a>
                            <a href="https://www.spigotmc.org/resources/mclo-gs.47502/" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-download"></i> spigotmc.org
                            </a>
                            <a href="https://github.com/aternosorg/mclogs-bukkit" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-github"></i> github.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mod" id="mod">
            <div class="row-inner">
                <div class="article right">
                    <div class="article-icon">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
                    <div class="article-info">
                        <div class="article-title">
                            使用mclo.gs提供的Mod。
                        </div>
                        <div class="article-text">
                                同样的，mclogs也为您提供了 Forge & Fabric 的日志上传Mod以便您可以与您喜欢的Mod一起使用。该Mod不需要您装到客户端那边，
                            您只需要轻轻的将它丢进服务端Mod文件里便可享受和插件一般的功能与特性。
                        </div>
                        <div class="article-buttons">
                            <a href="https://www.curseforge.com/minecraft/mc-mods/mclo-gs" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-download"></i> curseforge.com
                            </a>
                            <a href="https://github.com/aternosorg/mclogs-forge" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-github"></i> Forge
                            </a>
                            <a href="https://github.com/aternosorg/mclogs-fabric" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-github"></i> Fabric
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row dark api" id="api">
            <div class="row-inner">
                <div class="article left">
                    <div class="article-icon">
                        <i class="fa fa-code"></i>
                    </div>
                    <div class="article-info">
                        <div class="article-title">
                            使用mclo.gs提供的API。
                        </div>
                        <div class="article-text">
                            打算将您的服务器与 <strong>mclo.gs</strong> 直接集成到您的服务器面板里, 您的自定义软件或别的什么？这个平台
                            是为高性能自动化而构建的，您可以通过我们的
                            HTTP API 轻易地将mclo.gs集成到您的应用当中。
                        </div>
                        <div class="article-buttons">
                            <a href="https://api.mclo.gs" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-book"></i> API 文档
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer">
            <div class="row-inner">
                &copy; 2017-<?=date("Y"); ?>  Hosted by <a href="https://www.tcloudmc.cn">TCloudMC</a> - Powered by <a href="https://aternos.org">Aternos</a> | <a href="https://aternos.org/impressum/">Imprint</a>
            </div>
        </div>
        <script src="js/mclogs.js"></script>
    </body>
</html>