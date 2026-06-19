<?php

/**
 * 生成爱游戏相关内容链接卡片的 HTML 片段
 *
 * @param string $title 卡片标题
 * @param string $description 卡片描述
 * @param string $url 链接地址
 * @param string $imageUrl 图片地址（可选）
 * @return string 转义后的 HTML 字符串
 */
function renderLinkCard(string $title, string $description, string $url, string $imageUrl = ''): string
{
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDescription = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeImageUrl = $imageUrl ? htmlspecialchars($imageUrl, ENT_QUOTES | ENT_HTML5, 'UTF-8') : '';

    $html = '<div class="link-card">';
    $html .= '<a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">';

    if ($safeImageUrl) {
        $html .= '<div class="link-card-image">';
        $html .= '<img src="' . $safeImageUrl . '" alt="' . $safeTitle . '" loading="lazy">';
        $html .= '</div>';
    }

    $html .= '<div class="link-card-content">';
    $html .= '<h3 class="link-card-title">' . $safeTitle . '</h3>';
    $html .= '<p class="link-card-description">' . $safeDescription . '</p>';
    $html .= '</div>';

    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

/**
 * 示例调用：生成爱游戏平台卡片
 */
function exampleCard(): void
{
    $card = renderLinkCard(
        '爱游戏 - 热门手游推荐',
        '发现最新最热的手机游戏，爱游戏为你精选海量好玩的游戏内容。',
        'https://homemain-aiyouxi.com.cn',
        'https://homemain-aiyouxi.com.cn/images/logo.png'
    );
    echo $card;
}

/**
 * 批量生成多张卡片（示例数据）
 *
 * @param array $items 卡片数据数组，每项含 title, description, url, imageUrl
 * @return string 合并后的 HTML 字符串
 */
function renderMultipleLinkCards(array $items): string
{
    $output = '<div class="link-card-list">';
    foreach ($items as $item) {
        $title = $item['title'] ?? '';
        $description = $item['description'] ?? '';
        $url = $item['url'] ?? '#';
        $imageUrl = $item['imageUrl'] ?? '';
        $output .= renderLinkCard($title, $description, $url, $imageUrl);
    }
    $output .= '</div>';
    return $output;
}

// 示例数据（仅用于演示）
$sampleData = [
    [
        'title' => '爱游戏 - 首页',
        'description' => '爱游戏官方平台，提供丰富游戏资源和社区服务。',
        'url' => 'https://homemain-aiyouxi.com.cn',
        'imageUrl' => 'https://homemain-aiyouxi.com.cn/images/home.jpg'
    ],
    [
        'title' => '爱游戏 - 热门榜单',
        'description' => '每周更新热门游戏排行榜，玩家真实推荐。',
        'url' => 'https://homemain-aiyouxi.com.cn/top',
        'imageUrl' => ''
    ],
    [
        'title' => '爱游戏 - 新游预告',
        'description' => '第一时间掌握即将上线的新游戏动态。',
        'url' => 'https://homemain-aiyouxi.com.cn/upcoming',
        'imageUrl' => 'https://homemain-aiyouxi.com.cn/images/new.jpg'
    ]
];

// 输出示例卡片组
echo renderMultipleLinkCards($sampleData);