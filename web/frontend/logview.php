<?php
$id = new Id(substr($_SERVER['REQUEST_URI'], 1));
$log = new Log($id);

$title = "TLogs - 上传, 分享 & 分析您的 Minecraft 服务器日志";
$description = "轻松粘贴您的Minecraft服务器日志，以共享和分析它们。";
if (!$log->exists()) {
    $title = "日志未找到 - TLogs";
    http_response_code(404);
} else {
    $analysis = $log->getAnalysis();
    $codexLog = $log->get();
    $information = $analysis->getInformation();
    $problems = $analysis->getProblems();
    if ($codexLog instanceof \Aternos\Codex\Minecraft\Log\MinecraftServerLog) {
        $software = $codexLog->getServerSoftware();
    } else {
        $software = "Unknown";
    }
    $title = $software . " 服务器日志 [#" . $id->get() . "] - TLogs";
    $lineNumbers = $log->getLineNumbers();
    $lineString = $lineNumbers === 1 ? "行" : "行";

    $errorCount = $log->getErrorCount();
    $errorString = $errorCount === 1 ? "个错误" : "多个错误";

    $description = $lineNumbers . " " . $lineString;
    if ($errorCount > 0) {
       $description .= " | " . $errorCount . " " . $errorString;
    }

    if (count($problems) > 0) {
        $problemString = "多个问题";
        if (count($problems) === 1) {
            $problemString = "个问题";
        }
        $description .= " | " . count($problems) . " " . $problemString . " 自动检测已完成";
    }
}
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-language" content="zh-CN" />
        <meta name="theme-color" content="#2d3943" />

        <link rel="stylesheet" href="//fonts.font.im/css?family=Play:400,700">
        <link href="https://fonts.font.im/css?family=Roboto+Mono:300,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet" />

        <title><?=$title; ?></title>

        <base href="/frontend/" />

        <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.2.0/css/fontawesome.min.css" />
        <link rel="stylesheet" href="css/btn.css" />
        <link rel="stylesheet" href="css/mclogs.css?v=130220" />
        <link rel="stylesheet" href="css/log.css?v=180219" />
        <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

        <meta name="description" content="<?=$description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-43611107-4"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments)};
            gtag('js', new Date());

            gtag('config', 'UA-43611107-4', { 'anonymize_ip': true });
        </script>
    </head>
    <body class="log-body">
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
        <div class="row dark log-row">
            <div class="row-inner">
                <?php if($log->exists()): ?>
                <div class="log-info">
                    <div class="log-info-actions">
                        <?php if($errorCount): ?>
                        <div class="btn btn-red btn-small error-toggle">
                            <i class="fa fa-exclamation-circle"></i>
                            <?=$errorCount . " " . $errorString; ?>
                        </div>
                        <?php endif; ?>
                        <div class="btn btn-blue btn-small down-button">
                            <i class="fa fa-arrow-circle-down"></i>
                            <?=$lineNumbers . " " . $lineString; ?>
                        </div>
                    </div>
                </div>
                <?php if(count($analysis) > 0 || $codexLog instanceof \Aternos\Codex\Minecraft\Log\MinecraftServerLog): ?>
                    <div class="analysis">
                        <div class="analysis-headline"><i class="fa fa-info-circle"></i> Analysis</div>
                        <?php if($codexLog instanceof \Aternos\Codex\Minecraft\Log\MinecraftServerLog || count($information) > 0): ?>
                            <div class="information-list">
                                <?php if($codexLog instanceof \Aternos\Codex\Minecraft\Log\MinecraftServerLog): ?>
                                <div class="information">
                                    <div class="information-label">
                                        Server software:
                                    </div>
                                    <div class="information-value">
                                        <?=$codexLog->getServerSoftware(); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php foreach($information as $info): ?>
                                    <?php /** @var \Aternos\Codex\Minecraft\Analysis\Information\MinecraftInformation $info */ ?>
                                    <div class="information">
                                        <div class="information-label">
                                            <?=$info->getLabel(); ?>:
                                        </div>
                                        <div class="information-value">
                                            <?=$info->getValue(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(count($problems) > 0): ?>
                            <div class="problem-list">
                                <?php foreach($problems as $problem): ?>
                                    <?php /** @var \Aternos\Codex\Minecraft\Analysis\Problem\MinecraftProblem $problem */ ?>
                                    <div class="problem">
                                        <div class="problem">
                                            <div class="problem-header">
                                                <div class="problem-message">
                                                    <i class="fa fa-exclamation-triangle"></i> <?=htmlspecialchars($problem->getMessage()); ?>
                                                </div>
                                                <?php $number = $problem->getEntry()[0]->getNumber(); ?>
                                                <a href="/<?=$id->get() . "#L" . $number; ?>" class="btn btn-blue btn-no-margin btn-small" onclick="updateLineNumber('#L<?=$number; ?>');">
                                                    <span class="hide-mobile"><i class="fa fa-arrow-right"></i> Line </span>#<?=$number; ?>
                                                </a>
                                            </div>
                                            <div class="problem-body">
                                                <div class="problem-solution-headline">
                                                    Solutions
                                                </div>
                                                <div class="problem-solution-list">
                                                    <?php foreach($problem->getSolutions() as $solution): ?>
                                                        <?php /** @var \Aternos\Codex\Minecraft\Analysis\Solution\MinecraftSolution $solution */ ?>
                                                        <div class="problem-solution">
                                                            <?=preg_replace("/'([^']+)'/", "'<strong>$1</strong>'", htmlspecialchars($solution->getMessage())); ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="log">
                    <?php
                        $log->renew();
                        echo $log->getPrinter()->print();
                    ?>
                </div>
                <div class="log-info">
                    <div class="log-info-actions">
                        <div class="btn btn-blue btn-small btn-notext up-button">
                            <i class="fa fa-arrow-circle-up"></i>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="not-found">
                    <div class="not-found-title">404 - 日志未被找到。</div>
                    <div class="not-found-text">您尝试打开的的日志不再存在。<br />我们会自动删除过去7天内没有被打开过的所有日志。</div>
                    <div class="not-found-buttons">
                        <a href="/" class="btn btn-no-margin btn-blue btn-small">
                            <i class="fa fa-home"></i> Paste a new log
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if($log->exists()): ?>
        <div class="row row-notice dark">
            <div class="row-inner">
                此日志将从其最后被查看的时间开始保存7天。<br />
                <a href="mailto:abuse@aternos.org?subject=Report%20mclo.gs/<?=$id->get(); ?>">举报滥用</a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row footer">
            <div class="row-inner">
                &copy; 2017-<?=date("Y"); ?>  Hosted by <a href="https://www.tcloudmc.cn">TCloudMC</a> - Powered by <a href="https://aternos.org">Aternos</a> | <a href="https://aternos.org/impressum/">Imprint</a>
            </div>
        </div>
        <script src="js/logview.js?v=130220"></script>
    </body>
</html>
