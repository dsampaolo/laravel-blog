<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"
                                           xmlns:content="http://purl.org/rss/1.0/modules/content/"
                                           xmlns:wfw="http://wellformedweb.org/CommentAPI/"
                                           xmlns:dc="http://purl.org/dc/elements/1.1/"
                                           xmlns:atom="http://www.w3.org/2005/Atom"
                                           xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
                                           xmlns:slash="http://purl.org/rss/1.0/modules/slash/">

    <channel>
        <title>{{ $site_name }}</title>
        <atom:link href="{{ URL::to('/') }}/feed" rel="self" type="application/rss+xml" />
        <link>{{ URL::to('/') }}</link>
        <description></description>
        <lastBuildDate>{{ $last_build_date }}</lastBuildDate>
        <language>fr-FR</language>
        <sy:updatePeriod>hourly</sy:updatePeriod>
        <sy:updateFrequency>1</sy:updateFrequency>

        @foreach($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <link>{{ $post->url }}</link>
            <pubDate>{{ $post->pubDate }}</pubDate>

            <guid isPermaLink="true">{{ $post->url }}</guid>
            <description><![CDATA[<p>{{ $post->chapo }}</p>
                ]]></description>
        </item>
        @endforeach

    </channel>
</rss>
