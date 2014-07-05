-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2014 at 09:43 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `playerdirectory`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `preview` text NOT NULL,
  `post` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `post` (`post`,`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `preview`, `post`, `date`, `fname`) VALUES
(126, 'Huckle', '<p>asdf</p>\r\n', '<p>asdf</p>\r\n \r\n<p>sdfgsdgf</p>', '2014-03-20 20:48:18', 'huckle'),
(127, 'Buckle', '<p><img src="../tinymce/plugins/emoticons/img/smiley-cool.gif" alt="" />asdsd</p>', '<p><img src="../tinymce/plugins/emoticons/img/smiley-cool.gif" alt="" />asdsd</p>', '2014-03-20 20:50:52', 'buckle'),
(104, 'aewygh34yh43yhg', '<p>haagwga34g</p>', '<p>haagwga34g</p>', '2014-03-11 05:21:47', 'aewygh34yh43yhg'),
(123, 'testadmiangian', '<p>japoiwfjeewfawef</p>', '<p>japoiwfjeewfawef</p>', '2014-03-14 20:12:58', 'testadmiangian'),
(107, 'asdgaew44gaadsageawgeewag', '', '', '2014-03-11 05:22:00', 'asdgaew44gaadsageawgeewag'),
(108, 'afsd4t43a3w4ga4ewg', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', '2014-03-13 19:24:55', 'afsd4t43a3w4ga4ewg'),
(109, 'asdf43agraewgb4awhb', '<p>ahwa4wrhbaswrghaw4</p>', '<p>ahwa4wrhbaswrghaw4</p>', '2014-03-13 19:27:28', 'asdf43agraewgb4awhb'),
(110, 'ahrrehraehnberbhn', '<p>arhewa34u54j45555555555</p>', '<p>arhewa34u54j45555555555</p>', '2014-03-13 19:28:10', 'ahrrehraehnberbhn'),
(111, 'ahrrehraehnberbhnasdg', '<p>agrgrag</p>', '<p>agrgrag</p>', '2014-03-13 19:28:37', 'ahrrehraehnberbhnasdg'),
(113, 'fas443h43ha', '<p>sadfasf</p>', '<p>sadfasf</p>', '2014-03-13 19:31:52', 'fas443h43ha'),
(115, 'dsag43h', '<p>3ha4aew4h34a</p>', '<p>3ha4aew4h34a</p>', '2014-03-13 19:41:05', 'dsag43h'),
(116, 'dasgewahbw4ah4aw', '<p>adgeswgewage</p>', '<p>adgeswgewage</p>', '2014-03-13 19:49:16', 'dasgewahbw4ah4aw'),
(117, 'taewgwega', '<p>tawteawtwe</p>', '<p>tawteawtwe</p>', '2014-03-13 20:32:23', 'taewgwega'),
(118, 'TESTING TAG 15', '<p>awwgaegawegewagag</p>', '<p>awwgaegawegewagag</p>', '2014-03-13 21:32:37', 'testing-tag-15'),
(119, 'tags', '<p>tags</p>\n', '<p>tags</p>\n \n<p>tags</p>', '2014-03-14 01:47:26', 'tags'),
(120, 'Test34', '<p>testsetestest</p>', '<p>testsetestest</p>', '2014-03-14 02:34:47', 'test34'),
(121, 'llllmozillatesst', '<p>n;kn;kn;kn;</p>', '<p>n;kn;kn;kn;</p>', '2014-03-14 03:14:32', 'llllmozillatesst'),
(122, 'asfdasf', '<p>asdf</p>', '<p>asdf</p>', '2014-03-14 03:43:58', 'asfdasf'),
(125, 'adsfdas', '<p>ffas</p>\r\n', '<p>ffas</p>\r\n \r\n<p>test2</p>', '2014-03-15 05:36:02', 'adsfdas'),
(124, 'llllmozillatesst4343', '<p>teawrwef</p>\r\n', '<p>teawrwef</p>\r\n \r\n<p>3323</p>', '2014-03-15 05:33:07', 'llllmozillatesst4343'),
(79, 'yiffhkf', '<p>asdf</p>', '<p>asdf</p>', '2014-03-05 16:30:45', 'yiffhkf'),
(81, 'Test213', '<p>One important but often neglected part of building a browsergame is planning it &ndash; what you will be building, and how you will be building it.</p>\r\n<p>So far, we&rsquo;ve built a login and registration system for a browsergame &ndash; but not much else. In order to plan a little more out for our game, here&rsquo;s a small sketch of what we&rsquo;ll build(at least to start off):</p>\r\n<ul>\r\n<ul>\r\n<li>\r\n<h2>Town</h2>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p>There will be a town, where users can access all of the shops/etc. within the game. These shops are the bank(pays interest on each daily visit by the user), the armor shop, weapon shop, and healer(although there could be more shops later).</p>\r\n', '<p>One important but often neglected part of building a browsergame is planning it &ndash; what you will be building, and how you will be building it.</p>\r\n<p>So far, we&rsquo;ve built a login and registration system for a browsergame &ndash; but not much else. In order to plan a little more out for our game, here&rsquo;s a small sketch of what we&rsquo;ll build(at least to start off):</p>\r\n<ul>\r\n<ul>\r\n<li>\r\n<h2>Town</h2>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p>There will be a town, where users can access all of the shops/etc. within the game. These shops are the bank(pays interest on each daily visit by the user), the armor shop, weapon shop, and healer(although there could be more shops later).</p>\r\n \r\n<ul>\r\n<ul>\r\n<li>\r\n<h2>Forest</h2>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p>There will also be a forest area, where users can get into fights with creatures and search for items(very low chance to find items). Users will be able to search for monsters, visit the spring(random 2% chance to have something cool happen), or search for items/go back to town.</p>\r\n<ul>\r\n<ul>\r\n<li>\r\n<h2>Monsters</h2>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p>To begin with, there will only be a few monsters. These are their names(they don&rsquo;t have stats yet):</p>\r\n<ul>\r\n<ul>\r\n<ul>\r\n<li>Crazy Eric</li>\r\n<li>Psychotic Jeff</li>\r\n<li>Laid back Nick</li>\r\n<li>Lazy Russell</li>\r\n<li>Hard Hitting Louis</li>\r\n</ul>\r\n<li>\r\n<h2>Tracking</h2>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p>A count will be kept of how many of each particular monster a user has killed &ndash; eventually, this might be used for a quest or something.</p>\r\n<ul>\r\n<ul>\r\n<li>\r\n<h2>Administrator Control Panel</h2>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p>It would be nice to build an administrator control panel, so that administrator users can easily add items/monsters/etc. to the game, without having to interact with(and potentially screw up) the database directly.</p>\r\n<p>And that&rsquo;s what will be in the browsergame that we&rsquo;ve been building &ndash; if there&rsquo;s anything else that you think should be in it(or you&rsquo;d like to learn how to implement &ndash; we can add it in), just send an e-mail to&nbsp;<a href="mailto:buildingbrowsergames@gmail.com">buildingbrowsergames@gmail.com</a>.</p>', '2014-03-05 21:08:06', 'test213'),
(72, 'Ruck 1', '<p><strong>The New York Times Incompetence in Macroeconomic Reporting (IMR) Award</strong></p>\n<p>I have&nbsp;<a href="http://neweconomicperspectives.org/2013/04/the-new-york-times-thinks-bleeding-cyprus-is-strong-medicine.html">written</a>&nbsp;repeatedly about the&nbsp;<em>New York Times&rsquo;&nbsp;</em>needs to create a prize in incompetence in macroeconomic reporting (IMR) and suggested that the paper award the IMR prize to its reporters.&nbsp; I suggested that the prize consist of a two hour lunch with Paul Krugman in which he will provide them with a remedial lecture on why austerity is an economically illiterate response to a recession.</p>\n<p><em>NYT&nbsp;</em>columns discussing austerity, particularly in the eurozone, demonstrate that its reporters religiously avoid reading Krugman&rsquo;s scores of columns on austerity.&nbsp; As always on this subject, I want to make express that I don&rsquo;t insist that the reporters agree with economics.&nbsp; It is fine for reporters to state that economics has known for 75 years that austerity is a self-destructive response to a recession but that some economists disagree.&nbsp;&nbsp; It is fine for the reporter to explain why he agrees with the austerian economists.&nbsp; It is not acceptable journalism to ignore the dominant economic view, 75 years of supporting events, and the empirical studies by austerians (the IMF) finding that fiscal changes have more powerful effects on the economy consistent with the dominant theory.&nbsp; It is not acceptable journalism to ignore unemployment and inequality and the role of austerity in increasing both.&nbsp; I end by expanding on Krugman&rsquo;s column about a tragic financial media meme by discussing three related memes that are causing great harm.</p>\n', '<p><strong>The New York Times Incompetence in Macroeconomic Reporting (IMR) Award</strong></p>\n<p>I have&nbsp;<a href="http://neweconomicperspectives.org/2013/04/the-new-york-times-thinks-bleeding-cyprus-is-strong-medicine.html">written</a>&nbsp;repeatedly about the&nbsp;<em>New York Times&rsquo;&nbsp;</em>needs to create a prize in incompetence in macroeconomic reporting (IMR) and suggested that the paper award the IMR prize to its reporters.&nbsp; I suggested that the prize consist of a two hour lunch with Paul Krugman in which he will provide them with a remedial lecture on why austerity is an economically illiterate response to a recession.</p>\n<p><em>NYT&nbsp;</em>columns discussing austerity, particularly in the eurozone, demonstrate that its reporters religiously avoid reading Krugman&rsquo;s scores of columns on austerity.&nbsp; As always on this subject, I want to make express that I don&rsquo;t insist that the reporters agree with economics.&nbsp; It is fine for reporters to state that economics has known for 75 years that austerity is a self-destructive response to a recession but that some economists disagree.&nbsp;&nbsp; It is fine for the reporter to explain why he agrees with the austerian economists.&nbsp; It is not acceptable journalism to ignore the dominant economic view, 75 years of supporting events, and the empirical studies by austerians (the IMF) finding that fiscal changes have more powerful effects on the economy consistent with the dominant theory.&nbsp; It is not acceptable journalism to ignore unemployment and inequality and the role of austerity in increasing both.&nbsp; I end by expanding on Krugman&rsquo;s column about a tragic financial media meme by discussing three related memes that are causing great harm.</p>\n \n<p>&nbsp;</p>\n<p>This column discusses three articles that ran in the&nbsp;<em>NYT&nbsp;</em>on February 20, 2014.&nbsp; The columns are by David Brooks, Michael Shear, and Paul Krugman.</p>\n<p><strong>David Brooks&rsquo; column: NYT&rsquo;s Reporters are to the Right of Brooks and AEI on Austerity</strong></p>\n<p>How bad have&nbsp;<em>NYT&nbsp;</em>reporters and editorial board become on the subject of austerity?&nbsp; They are to the right of David Brooks and the hard right American Enterprise Institute.&nbsp; My new plea, therefore, is that if the&nbsp;<em>NYT&nbsp;</em>is determined to ignore Krugman and economics on the subject of austerity, would they be willing to listen to David Brooks?&nbsp; In a February 20, 2014 column entitled &ldquo;<a href="http://www.nytimes.com/2014/02/21/opinion/brooks-capitalism-for-the-masses.html?action=click&amp;contentCollection=Opinion&amp;region=Footer&amp;module=MoreInSection&amp;pgtype=article">Capitalism for the Masses</a>&rdquo; Brooks wrote about his namesake (not a relative) who runs the American Enterprise Institute (AEI).&nbsp; AEI is a hard right group that is particularly culpable for its unholy war against effective financial regulation that was a major contributor to the criminogenic environment that produced the accounting control fraud epidemics that drove the crisis and the Great Recession.</p>\n<blockquote>\n<p>&ldquo;[Arthur Brooks] pointed out that conservatives love to talk about private charity, but, if you took the entire $40 billion that Americans donate to human service organizations annually, it would be enough money to give each person who receives federal food assistance only $847 per year.</p>\n<p>Instead, Republicans need to declare a truce on the social safety net. They need to assure the country that the net will always be there for the truly needy.&rdquo;</p>\n</blockquote>\n<p><strong>Michael Shear&rsquo;s ode to austerity</strong></p>\n<p>Contrast this call by the AEI head for an end to the right&rsquo;s &ldquo;war&rdquo; against &ldquo;the social safety net&rdquo; with the Michael Shear&rsquo;s news story that ran the same day in the&nbsp;<em>NYT&nbsp;</em>and was entitled &ldquo;<a href="http://www.nytimes.com/2014/02/21/us/politics/obamas-2015-budget-to-sidestep-bipartisan-offers.html?hp">Obama&rsquo;s Budget Omits Trims to Social Security</a>.&rdquo;</p>\n<p><strong>Shear&rsquo;s nostalgia for the &ldquo;grand betrayal&rdquo;</strong></p>\n<p>Shear&rsquo;s first paragraph demonstrates that he buys into austerity so completely that it isn&rsquo;t even an issue.</p>\n<blockquote>\n<p>&ldquo;President Obama&rsquo;s forthcoming budget plan will not include a proposal to trim cost-of-living increases in Social Security checks, the gesture of bipartisanship he made to Republicans last year in a failed strategy to reach a &ldquo;grand compromise&rdquo; on reducing projected federal debt.&rdquo;</p>\n</blockquote>\n<p>The article treats the &ldquo;grand bargain&rdquo; as an obviously grand thing because it is &ldquo;grand&rdquo; and it is (purportedly) a &ldquo;compromise.&rdquo;&nbsp; Bad journalists have a Pavlovian-response to the word &ldquo;compromise&rdquo; &ndash; it must be good.&nbsp; Compromise can be very good.&nbsp; It can also be terrible.</p>\n<p>The &ldquo;grand bargain&rdquo; is actually a grand betrayal.&nbsp; It isn&rsquo;t a &ldquo;compromise&rdquo; on austerity; it&rsquo;s an agreement to inflict multiple forms of austerity contemporaneously.&nbsp; The grand betrayal is equivalent to bleeding the patient three times.&nbsp; It would have sharply cut spending on social programs and the safety net (through &ldquo;chained&rdquo; cost-of-living payments to Social Security recipients) while increasing taxes.&nbsp; It would harm the economic recovery, reduce services to those that needed them at the time they most needed those services, and it would increase inequality.&nbsp; It would also have been an act of war against the safety net under Arthur Brook&rsquo;s martial metaphor imploring the right to offer a &ldquo;truce&rdquo; ending its war against the safety net.&nbsp; I&rsquo;ve explained why, had President Obama been able to reach the grand betrayal in the summer of 2011, the resultant austerity would have thrown the economy into a gratuitous second recession, doomed Obama&rsquo;s reelection campaign in 2012,&nbsp; and given the Republicans control of the Senate.&nbsp; Obama abandoned stimulus and moved toward austerity under the increasing influence of Treasury Secretary Timothy Geithner and Bill Daley &ndash; Wall Street&rsquo;s leading apologists within the administration.</p>\n<p>Don&rsquo;t fall for news accounts that tell you that Geithner wasn&rsquo;t from Wall Street &ndash; the NY Fed is the true center (it has no &ldquo;heart&rdquo;) of Wall Street.&nbsp; Geithner represented Wall Street, not the U.S. public, when he was its president.&nbsp; That&rsquo;s why he was promoted to run Treasury after finishing in a dead tie with Greenspan and Bernanke as the most destructive anti-regulators in U.S. history.&nbsp; If any of those three individuals, now thankfully removed from any pretense that they serve the American people, had been even a minimally effective financial regulator and had acted against the accounting control fraud epidemics driving the crisis there would have been no crisis and no Great Recession.</p>\n<p>Shear&rsquo;s column doesn&rsquo;t mention six terms that any article about the grand betrayal or his preferred euphemism (&ldquo;grand compromise&rdquo;) would logically have to contain:&nbsp; &ldquo;austerity,&rdquo; &ldquo;stimulus,&rdquo; &ldquo;recession,&rdquo; &ldquo;unemployment,&rdquo; &ldquo;demand,&rdquo; or &ldquo;safety net.&rdquo;&nbsp; Here&rsquo;s an example of how to use these terms if one were actually discussing the issues Shear purports to be discussing.</p>\n<ul>\n<li>The financial crisis triggered such a sharp fall in demand that the United States suffered a &ldquo;Great Recession&rdquo; in which unemployment surged.&nbsp; The U.S. responded with a limited stimulus program that provided sufficient demand that the sharp fall in the U.S. economy was soon brought to an end and a modest recovery in unemployment began.&nbsp; From 2011 on, however, U.S. policy has swung increasingly toward austerity, slowing the rate of the U.S. economic recovery and rendering it more fragile to potential external shocks.&nbsp; The safety net has proven critical both in reducing harm to Americans from the Great Recession and in acting as an &ldquo;automatic stabilizer&rdquo; that aids recovery.&nbsp; The targeted U.S. budget deficit is currently too small.</li>\n</ul>\n<p>It would be very bad economics and inhumane to reduce Social Security payments.&nbsp; What I have written is standard macroeconomics.&nbsp; Surveys indicate overwhelming support among academic economists for stimulus in response to the Great Recession.&nbsp; &ldquo;Revealed preferences&rdquo; demonstrate that when Republicans control the U.S. government and confront a recession in the modern era they use stimulus.&nbsp; It is only when Democrats inherit recessions that began under Republican administrations that Republicans oppose stimulus as a response.</p>\n<p>To reiterate, I have no problem with Shear, after acknowledging these facts, adopting and defending a different view.&nbsp; It is intellectually dishonest and a disservice to the readers, however, to frame the issue in a way that the issue disappears.&nbsp; It is not acceptable to have the Great Recession or unemployment disappear from consideration under Shear&rsquo;s framing.&nbsp; This is how Shear presents the issue of whether Obama will begin to unravel the safety net by cutting future Social Security payments that would have normally risen to cover lost purchasing power due to inflation.</p>\n<blockquote>\n<p>&ldquo;&lsquo;This reaffirms what has become all too apparent: The president has no interest in doing anything, even modest, to address our looming debt crisis,&rsquo; said Brendan Buck, a spokesman for the House speaker, John A. Boehner of Ohio.&rdquo;</p>\n</blockquote>\n<p>Notice that Shear treats the &ldquo;looming debt crisis&rdquo; and desirability of deficit reduction as facts so obviously true that they require no analysis.&nbsp; There is no &ldquo;looming debt crisis&rdquo; for the U.S. government and the deficit has been reduced too quickly.&nbsp; Notice that Shear implicitly treats federal budget deficits as harmful.&nbsp; There are circumstances where that could be true due to inflation and very high capacity utilization.&nbsp; We are not remotely in those circumstances.</p>\n<p>Shear quotes the even more revealing, and financially illiterate, series of statements by the administration and its critics.</p>\n<blockquote>\n<p>&ldquo;The budget plan, which will be out in early March, a month late, will abide by the overall spending guidelines agreed to by Republicans and Democrats late last year. But included in those spending limits will be a $56 billion proposal to increase spending on some of Mr. Obama&rsquo;s key initiatives, officials said.</p>\n<p>Mr. Earnest [Obama&rsquo;s wondrously named deputy press flack] said that would include spending on manufacturing &lsquo;hubs&rsquo; that the president has promoted over the last year; additional government programs aimed at helping people develop new skills; and funding for early childhood education programs like preschool.</p>\n<p>Mr. Earnest said this new spending would be offset by revenue increases, and cuts in other parts of the budget.</p>\n<p>&lsquo;This initiative that the president will propose will be fully paid for,&rsquo; Mr. Earnest said. White House officials declined to describe the revenue increases, but said they would include closing corporate loopholes, a move the president has supported in the past.</p>\n<p>Mr. Buck [Boehner&rsquo;s wondrously named aide] criticized the $56 billion proposal as another effort by the president to spend more taxpayer money than the government can afford.&rdquo;</p>\n</blockquote>\n<p>Notice that the administration and its critics both treat austerity as sound and say things that demonstrate that they are financially illiterate.&nbsp; Obama wants to add skills training.&nbsp; Fine, but the reason that we have such massive loss of employment (remember that the unemployment rate is being held down by the staggering number of Americans who have become so discouraged that they have given up trying to find a job) is that demand is so inadequate that there are near record levels of unemployed relative to job openings.&nbsp; Inadequate demand is the critical problem we face &ndash; and the administration, its critics, and the&nbsp;<em>NYT&nbsp;</em>all the frame the issue to ignore the Great Recession, the unemployment, and the lack of demand while implicitly assuming that greater austerity must be the answer to these problems.&nbsp; We do not need to &ldquo;pay for&rdquo; job training initiatives through tax increases or program cuts in the sense that the administration spokesman uses.&nbsp; The deficit the administration is aiming for is already too small.</p>\n<p>Buck&rsquo;s comments (&ldquo;spend more taxpayer money than the government can afford&rdquo;) are simply more extreme versions of the administration fallacy as set forth by Earnest.&nbsp; One can hardly fault Earnest for parroting his boss&rsquo; infamous absurdity about &ldquo;running&rdquo; &ldquo;out of money&rdquo; in his May 23, 2009 C-SPAN interview with Steve Scully.</p>\n<p>SCULLY: You know the numbers, $1.7 trillion debt, a national deficit of $11 trillion. At what point do we run out of money?</p>\n<p>OBAMA: Well, we are out of money now. We are operating in deep deficits, not caused by any decisions we&rsquo;ve made on health care so far. This is a consequence of the crisis that we&rsquo;ve seen and in fact our failure to make some good decisions on health care over the last several decades.</p>\n<p>The U.S. has a sovereign currency.&nbsp; We cannot run out of U.S. dollars.&nbsp; Deficits cannot make us run out of U.S. dollars.</p>\n<p><strong>The Obama administration is still hooked on austerity and the grand betrayal</strong></p>\n<p>The Obama administration is still enamored of austerity, it simply wants it &ldquo;balanced&rdquo; which is code for about one-third austerity through increased taxes and two-thirds of austerity through cutting social programs and the safety net.&nbsp; Again, cutting social programs and the safety net and raising taxes at this time are all means of adding to harmful austerity.&nbsp; It is like bleeding the patients three times and claiming that &ldquo;balanced&rdquo; bleeding is good for patients.&nbsp; That is economically illiterate.&nbsp; But one would never even learn a hint of that even from the closest reading of Shear&rsquo;s column.&nbsp; The real takeaway is that it is an odd combination of Tea Party intransigence and progressive grit that forced Obama to back down (so far) on his long-term desire to inflict greater austerity and begin to unravel the safety net.</p>\n<blockquote>\n<p>&ldquo;White House officials said the president remained open to the idea of slowing the growth of the Social Security payments if Republicans change their minds. But senior officials said Thursday that they have no reason to believe that will happen before midterm elections this fall.&rdquo;</p>\n</blockquote>\n<p>As with the 2012 elections, the truly bizarre result is that the Tea Party is again preventing Obama from committing electoral suicide in November 2014 by refusing to accept even modest tax increases for wealthy Americans as part of Obama&rsquo;s grand betrayal of the public and the Democratic Party.&nbsp; If the Tea Party keeps opposing Obama for the wrong reasons and progressives continue to oppose him for the right reasons we may actually avoid the grand betrayal.</p>\n<p><strong>Krugman&rsquo;s column</strong></p>\n<p>Krugman&rsquo;s February 20, 2014 column was entitled &ldquo;<a href="http://www.nytimes.com/2014/02/21/opinion/krugman-the-stimulus-tragedy.html?hp&amp;rref=opinion">The Stimulus Tragedy</a>.&rdquo;&nbsp; It said pretty much what I just wrote above.&nbsp; Like Krugman, we expressed our views contemporaneously that the stimulus package was far too small.&nbsp; Because we don&rsquo;t have the same column length restrictions that Krugman must meet the readers of&nbsp;<em>New Economic Perspectives&nbsp;</em>have been able to read much more detailed explanations of how successful stimulus was in turning around the horrors of the Great Recession.&nbsp; The readers of Krugman or&nbsp;<em>New Economic Perspectives&nbsp;</em>would find equally familiar our overall analysis of stimulus and austerity because economists have known for 75 years, and policy has proved recurrently, that robust automatic stabilizers (which are fiscal) and specialized fiscal stimulus programs work effectively to reduce the length and severity of recessions.</p>\n<p>I do understand that Krugman doesn&rsquo;t work out of an office at the&nbsp;<em>NYT</em>, but if I can read his columns in Minnesota in frigid February, I am confident that Shear can read those same columns and could interview Krugman if he had any questions about Krugman&rsquo;s columns.&nbsp; I disagree with many dominant ideas in economics, so I&rsquo;m happy to read Shear&rsquo;s explanation of why he is an austerian despite economic theory and, as Krugman emphasizes in his column, the disastrous real world experiment with austerity in the eurozone that forced several nations of the periphery into gratuitous Great Depressions.</p>\n<p>I would be delighted to have Shear interview the Obama administration and report why it believes that &ldquo;balanced&rdquo; austerity is desirable and why it still favors the grand betrayal.&nbsp; It would be a fabulous journalistic enterprise to ask every member of Congress whether and why they thought stimulus succeeded or failed and whether they believe that the U.S. has run out of money.</p>\n<p><strong>The four tragic memes of austerity and stimulus</strong></p>\n<p>Krugman&rsquo;s column explains one aspect of the tragedy &ndash; the Republican&rsquo;s explicit, false meme that U.S. stimulus was a failure is now widely accepted even though it is utterly false.&nbsp; The data show a sharp break in the economic collapse during the Great Recession that makes perfect sense given expected lags as being the result of the stimulus program.&nbsp; As knowingly inadequate as the stimulus program was and as poorly designed as it was in terms of emphasis on far less effective (in increasing demand) tax cuts for the wealthy, it was still a substantial success.</p>\n<p>The second tragic meme is the claim that austerity has worked in the eurozone &ndash; when it forced the overall Eurozone into a second, gratuitous recession and one-third of the eurozone&rsquo;s total population into Great Depressions.&nbsp; The U.S. avoided these harms and experienced not only a sharp break in the collapse and a steady, albeit modest, recovery while one of our leading trading partners (the EU) went into the another recession, with much of it still suffering unemployment rates in excess of Great Depression levels.&nbsp; But the presentation I have given actually understates the case against austerity for the eurozone&rsquo;s initial response to the Great Recession was dominated by its automatic stabilizers &ndash; automatic fiscal stimulus.&nbsp; EU public expenditures rose due to the Great Recession costing millions of lost jobs while tax revenues fell.&nbsp; The EU initially rode that fiscal stimulus out of recession.&nbsp; The Eurozone, however, was plunged back into recession, and Italy, Spain, and Greece (collectively, one-third of the area&rsquo;s population) were forced into Great Depression levels of unemployment.&nbsp; They remain in Great Depression levels of unemployment roughly six years after the crisis face began.&nbsp; Worse, the EU&rsquo;s leading apologist for austerity, Ollie Rehn, recently predicted that under austerity it will take Spain ten years to emerge from the crisis phase (full employment would then still be years away).&nbsp; It takes astonishing&nbsp;<em>chutzpah</em>, but the<em>troika&nbsp;</em>(the EU Commission, the ECB, and the IMF) has most elites and media believing that causing a gratuitous eurozone-wide recession and a Great Depression to a vast swath of the region&rsquo;s population represents a &ldquo;success&rdquo; while the U.S. stimulus program that avoided a second recession (much less Great Depression) and returned the U.S. economy to growth years before the eurozone constitutes an epic failure. &nbsp;To the extent the eurozone&rsquo;s core may finally be crawling its way out of recession it is critical to recall that nearly all of the core nations continue to run budget deficits that help provide the minimal growth we are seeing in many of the core nations.</p>\n<p>Third, unemployment, poverty, large scale emigration of new university graduates, and record inequality all tend to disappear from consideration under the austerity meme.&nbsp; What is substituted is &ldquo;there is no alternative&rdquo; (TINA), which seeks to preempt debate and even thought.&nbsp; The plight of one-third the eurozone&rsquo;s population trapped in Great Depression levels of unemployment becomes a non-issue.&nbsp; There is no alternative: gut it out and stop whining.&nbsp; The curves of economic illiteracy and callousness are intersecting at their respective maxima under the&nbsp;<em>troika&rsquo;s&nbsp;</em>infliction of austerity.</p>\n<p>Fourth, the meme of Social Darwinism on steroids inevitably accompanies TINA, mass unemployment, and record inequality.&nbsp; The unemployed are the problem; mass unemployment is merely a symptom of their deficiencies.&nbsp; The unemployed lack proper skills, they are protected by labor laws, and they are paid too much.&nbsp; Their unions need to be crushed and wages reduced dramatically to make them more &ldquo;competitive.&rdquo;&nbsp; The&nbsp;<em>troika&nbsp;</em>is not only generating a race to the bottom of wages &ndash; it is proud that it has created the perverse incentives that generate the &ldquo;Road to Bangladesh&rdquo; for workers&rsquo; wages in the European periphery.</p>', '2014-02-23 04:20:17', 'ruck-1');
INSERT INTO `blog` (`id`, `title`, `preview`, `post`, `date`, `fname`) VALUES
(73, 'Ruck 2', '<p><strong>The New York Times Incompetence in Macroeconomic Reporting (IMR) Award</strong></p>\r\n<p>I have&nbsp;<a href="http://neweconomicperspectives.org/2013/04/the-new-york-times-thinks-bleeding-cyprus-is-strong-medicine.html">written</a>&nbsp;repeatedly about the&nbsp;<em>New York Times&rsquo;&nbsp;</em>needs to create a prize in incompetence in macroeconomic reporting (IMR) and suggested that the paper award the IMR prize to its reporters.&nbsp; I suggested that the prize consist of a two hour lunch with Paul Krugman in which he will provide them with a remedial lecture on why austerity is an economically illiterate response to a recession.</p>', '<p><strong>The New York Times Incompetence in Macroeconomic Reporting (IMR) Award</strong></p>\r\n<p>I have&nbsp;<a href="http://neweconomicperspectives.org/2013/04/the-new-york-times-thinks-bleeding-cyprus-is-strong-medicine.html">written</a>&nbsp;repeatedly about the&nbsp;<em>New York Times&rsquo;&nbsp;</em>needs to create a prize in incompetence in macroeconomic reporting (IMR) and suggested that the paper award the IMR prize to its reporters.&nbsp; I suggested that the prize consist of a two hour lunch with Paul Krugman in which he will provide them with a remedial lecture on why austerity is an economically illiterate response to a recession.</p>\r\n<p><em>NYT&nbsp;</em>columns discussing austerity, particularly in the eurozone, demonstrate that its reporters religiously avoid reading Krugman&rsquo;s scores of columns on austerity.&nbsp; As always on this subject, I want to make express that I don&rsquo;t insist that the reporters agree with economics.&nbsp; It is fine for reporters to state that economics has known for 75 years that austerity is a self-destructive response to a recession but that some economists disagree.&nbsp;&nbsp; It is fine for the reporter to explain why he agrees with the austerian economists.&nbsp; It is not acceptable journalism to ignore the dominant economic view, 75 years of supporting events, and the empirical studies by austerians (the IMF) finding that fiscal changes have more powerful effects on the economy consistent with the dominant theory.&nbsp; It is not acceptable journalism to ignore unemployment and inequality and the role of austerity in increasing both.&nbsp; I end by expanding on Krugman&rsquo;s column about a tragic financial media meme by discussing three related memes that are causing great harm.</p>\r\n<p>&nbsp;</p>\r\n<p>This column discusses three articles that ran in the&nbsp;<em>NYT&nbsp;</em>on February 20, 2014.&nbsp; The columns are by David Brooks, Michael Shear, and Paul Krugman.</p>\r\n<p><strong>David Brooks&rsquo; column: NYT&rsquo;s Reporters are to the Right of Brooks and AEI on Austerity</strong></p>\r\n<p>How bad have&nbsp;<em>NYT&nbsp;</em>reporters and editorial board become on the subject of austerity?&nbsp; They are to the right of David Brooks and the hard right American Enterprise Institute.&nbsp; My new plea, therefore, is that if the&nbsp;<em>NYT&nbsp;</em>is determined to ignore Krugman and economics on the subject of austerity, would they be willing to listen to David Brooks?&nbsp; In a February 20, 2014 column entitled &ldquo;<a href="http://www.nytimes.com/2014/02/21/opinion/brooks-capitalism-for-the-masses.html?action=click&amp;contentCollection=Opinion&amp;region=Footer&amp;module=MoreInSection&amp;pgtype=article">Capitalism for the Masses</a>&rdquo; Brooks wrote about his namesake (not a relative) who runs the American Enterprise Institute (AEI).&nbsp; AEI is a hard right group that is particularly culpable for its unholy war against effective financial regulation that was a major contributor to the criminogenic environment that produced the accounting control fraud epidemics that drove the crisis and the Great Recession.</p>\r\n<blockquote>\r\n<p>&ldquo;[Arthur Brooks] pointed out that conservatives love to talk about private charity, but, if you took the entire $40 billion that Americans donate to human service organizations annually, it would be enough money to give each person who receives federal food assistance only $847 per year.</p>\r\n<p>Instead, Republicans need to declare a truce on the social safety net. They need to assure the country that the net will always be there for the truly needy.&rdquo;</p>\r\n</blockquote>\r\n<p><strong>Michael Shear&rsquo;s ode to austerity</strong></p>\r\n<p>Contrast this call by the AEI head for an end to the right&rsquo;s &ldquo;war&rdquo; against &ldquo;the social safety net&rdquo; with the Michael Shear&rsquo;s news story that ran the same day in the&nbsp;<em>NYT&nbsp;</em>and was entitled &ldquo;<a href="http://www.nytimes.com/2014/02/21/us/politics/obamas-2015-budget-to-sidestep-bipartisan-offers.html?hp">Obama&rsquo;s Budget Omits Trims to Social Security</a>.&rdquo;</p>\r\n<p><strong>Shear&rsquo;s nostalgia for the &ldquo;grand betrayal&rdquo;</strong></p>\r\n<p>Shear&rsquo;s first paragraph demonstrates that he buys into austerity so completely that it isn&rsquo;t even an issue.</p>\r\n<blockquote>\r\n<p>&ldquo;President Obama&rsquo;s forthcoming budget plan will not include a proposal to trim cost-of-living increases in Social Security checks, the gesture of bipartisanship he made to Republicans last year in a failed strategy to reach a &ldquo;grand compromise&rdquo; on reducing projected federal debt.&rdquo;</p>\r\n</blockquote>\r\n<p>The article treats the &ldquo;grand bargain&rdquo; as an obviously grand thing because it is &ldquo;grand&rdquo; and it is (purportedly) a &ldquo;compromise.&rdquo;&nbsp; Bad journalists have a Pavlovian-response to the word &ldquo;compromise&rdquo; &ndash; it must be good.&nbsp; Compromise can be very good.&nbsp; It can also be terrible.</p>\r\n<p>The &ldquo;grand bargain&rdquo; is actually a grand betrayal.&nbsp; It isn&rsquo;t a &ldquo;compromise&rdquo; on austerity; it&rsquo;s an agreement to inflict multiple forms of austerity contemporaneously.&nbsp; The grand betrayal is equivalent to bleeding the patient three times.&nbsp; It would have sharply cut spending on social programs and the safety net (through &ldquo;chained&rdquo; cost-of-living payments to Social Security recipients) while increasing taxes.&nbsp; It would harm the economic recovery, reduce services to those that needed them at the time they most needed those services, and it would increase inequality.&nbsp; It would also have been an act of war against the safety net under Arthur Brook&rsquo;s martial metaphor imploring the right to offer a &ldquo;truce&rdquo; ending its war against the safety net.&nbsp; I&rsquo;ve explained why, had President Obama been able to reach the grand betrayal in the summer of 2011, the resultant austerity would have thrown the economy into a gratuitous second recession, doomed Obama&rsquo;s reelection campaign in 2012,&nbsp; and given the Republicans control of the Senate.&nbsp; Obama abandoned stimulus and moved toward austerity under the increasing influence of Treasury Secretary Timothy Geithner and Bill Daley &ndash; Wall Street&rsquo;s leading apologists within the administration.</p>\r\n<p>Don&rsquo;t fall for news accounts that tell you that Geithner wasn&rsquo;t from Wall Street &ndash; the NY Fed is the true center (it has no &ldquo;heart&rdquo;) of Wall Street.&nbsp; Geithner represented Wall Street, not the U.S. public, when he was its president.&nbsp; That&rsquo;s why he was promoted to run Treasury after finishing in a dead tie with Greenspan and Bernanke as the most destructive anti-regulators in U.S. history.&nbsp; If any of those three individuals, now thankfully removed from any pretense that they serve the American people, had been even a minimally effective financial regulator and had acted against the accounting control fraud epidemics driving the crisis there would have been no crisis and no Great Recession.</p>\r\n<p>Shear&rsquo;s column doesn&rsquo;t mention six terms that any article about the grand betrayal or his preferred euphemism (&ldquo;grand compromise&rdquo;) would logically have to contain:&nbsp; &ldquo;austerity,&rdquo; &ldquo;stimulus,&rdquo; &ldquo;recession,&rdquo; &ldquo;unemployment,&rdquo; &ldquo;demand,&rdquo; or &ldquo;safety net.&rdquo;&nbsp; Here&rsquo;s an example of how to use these terms if one were actually discussing the issues Shear purports to be discussing.</p>\r\n<ul>\r\n<li>The financial crisis triggered such a sharp fall in demand that the United States suffered a &ldquo;Great Recession&rdquo; in which unemployment surged.&nbsp; The U.S. responded with a limited stimulus program that provided sufficient demand that the sharp fall in the U.S. economy was soon brought to an end and a modest recovery in unemployment began.&nbsp; From 2011 on, however, U.S. policy has swung increasingly toward austerity, slowing the rate of the U.S. economic recovery and rendering it more fragile to potential external shocks.&nbsp; The safety net has proven critical both in reducing harm to Americans from the Great Recession and in acting as an &ldquo;automatic stabilizer&rdquo; that aids recovery.&nbsp; The targeted U.S. budget deficit is currently too small.</li>\r\n</ul>\r\n<p>It would be very bad economics and inhumane to reduce Social Security payments.&nbsp; What I have written is standard macroeconomics.&nbsp; Surveys indicate overwhelming support among academic economists for stimulus in response to the Great Recession.&nbsp; &ldquo;Revealed preferences&rdquo; demonstrate that when Republicans control the U.S. government and confront a recession in the modern era they use stimulus.&nbsp; It is only when Democrats inherit recessions that began under Republican administrations that Republicans oppose stimulus as a response.</p>\r\n<p>To reiterate, I have no problem with Shear, after acknowledging these facts, adopting and defending a different view.&nbsp; It is intellectually dishonest and a disservice to the readers, however, to frame the issue in a way that the issue disappears.&nbsp; It is not acceptable to have the Great Recession or unemployment disappear from consideration under Shear&rsquo;s framing.&nbsp; This is how Shear presents the issue of whether Obama will begin to unravel the safety net by cutting future Social Security payments that would have normally risen to cover lost purchasing power due to inflation.</p>\r\n<blockquote>\r\n<p>&ldquo;&lsquo;This reaffirms what has become all too apparent: The president has no interest in doing anything, even modest, to address our looming debt crisis,&rsquo; said Brendan Buck, a spokesman for the House speaker, John A. Boehner of Ohio.&rdquo;</p>\r\n</blockquote>\r\n<p>Notice that Shear treats the &ldquo;looming debt crisis&rdquo; and desirability of deficit reduction as facts so obviously true that they require no analysis.&nbsp; There is no &ldquo;looming debt crisis&rdquo; for the U.S. government and the deficit has been reduced too quickly.&nbsp; Notice that Shear implicitly treats federal budget deficits as harmful.&nbsp; There are circumstances where that could be true due to inflation and very high capacity utilization.&nbsp; We are not remotely in those circumstances.</p>\r\n<p>Shear quotes the even more revealing, and financially illiterate, series of statements by the administration and its critics.</p>\r\n<blockquote>\r\n<p>&ldquo;The budget plan, which will be out in early March, a month late, will abide by the overall spending guidelines agreed to by Republicans and Democrats late last year. But included in those spending limits will be a $56 billion proposal to increase spending on some of Mr. Obama&rsquo;s key initiatives, officials said.</p>\r\n<p>Mr. Earnest [Obama&rsquo;s wondrously named deputy press flack] said that would include spending on manufacturing &lsquo;hubs&rsquo; that the president has promoted over the last year; additional government programs aimed at helping people develop new skills; and funding for early childhood education programs like preschool.</p>\r\n<p>Mr. Earnest said this new spending would be offset by revenue increases, and cuts in other parts of the budget.</p>\r\n<p>&lsquo;This initiative that the president will propose will be fully paid for,&rsquo; Mr. Earnest said. White House officials declined to describe the revenue increases, but said they would include closing corporate loopholes, a move the president has supported in the past.</p>\r\n<p>Mr. Buck [Boehner&rsquo;s wondrously named aide] criticized the $56 billion proposal as another effort by the president to spend more taxpayer money than the government can afford.&rdquo;</p>\r\n</blockquote>\r\n<p>Notice that the administration and its critics both treat austerity as sound and say things that demonstrate that they are financially illiterate.&nbsp; Obama wants to add skills training.&nbsp; Fine, but the reason that we have such massive loss of employment (remember that the unemployment rate is being held down by the staggering number of Americans who have become so discouraged that they have given up trying to find a job) is that demand is so inadequate that there are near record levels of unemployed relative to job openings.&nbsp; Inadequate demand is the critical problem we face &ndash; and the administration, its critics, and the&nbsp;<em>NYT&nbsp;</em>all the frame the issue to ignore the Great Recession, the unemployment, and the lack of demand while implicitly assuming that greater austerity must be the answer to these problems.&nbsp; We do not need to &ldquo;pay for&rdquo; job training initiatives through tax increases or program cuts in the sense that the administration spokesman uses.&nbsp; The deficit the administration is aiming for is already too small.</p>\r\n<p>Buck&rsquo;s comments (&ldquo;spend more taxpayer money than the government can afford&rdquo;) are simply more extreme versions of the administration fallacy as set forth by Earnest.&nbsp; One can hardly fault Earnest for parroting his boss&rsquo; infamous absurdity about &ldquo;running&rdquo; &ldquo;out of money&rdquo; in his May 23, 2009 C-SPAN interview with Steve Scully.</p>\r\n<p>SCULLY: You know the numbers, $1.7 trillion debt, a national deficit of $11 trillion. At what point do we run out of money?</p>\r\n<p>OBAMA: Well, we are out of money now. We are operating in deep deficits, not caused by any decisions we&rsquo;ve made on health care so far. This is a consequence of the crisis that we&rsquo;ve seen and in fact our failure to make some good decisions on health care over the last several decades.</p>\r\n<p>The U.S. has a sovereign currency.&nbsp; We cannot run out of U.S. dollars.&nbsp; Deficits cannot make us run out of U.S. dollars.</p>\r\n<p><strong>The Obama administration is still hooked on austerity and the grand betrayal</strong></p>\r\n<p>The Obama administration is still enamored of austerity, it simply wants it &ldquo;balanced&rdquo; which is code for about one-third austerity through increased taxes and two-thirds of austerity through cutting social programs and the safety net.&nbsp; Again, cutting social programs and the safety net and raising taxes at this time are all means of adding to harmful austerity.&nbsp; It is like bleeding the patients three times and claiming that &ldquo;balanced&rdquo; bleeding is good for patients.&nbsp; That is economically illiterate.&nbsp; But one would never even learn a hint of that even from the closest reading of Shear&rsquo;s column.&nbsp; The real takeaway is that it is an odd combination of Tea Party intransigence and progressive grit that forced Obama to back down (so far) on his long-term desire to inflict greater austerity and begin to unravel the safety net.</p>\r\n<blockquote>\r\n<p>&ldquo;White House officials said the president remained open to the idea of slowing the growth of the Social Security payments if Republicans change their minds. But senior officials said Thursday that they have no reason to believe that will happen before midterm elections this fall.&rdquo;</p>\r\n</blockquote>\r\n<p>As with the 2012 elections, the truly bizarre result is that the Tea Party is again preventing Obama from committing electoral suicide in November 2014 by refusing to accept even modest tax increases for wealthy Americans as part of Obama&rsquo;s grand betrayal of the public and the Democratic Party.&nbsp; If the Tea Party keeps opposing Obama for the wrong reasons and progressives continue to oppose him for the right reasons we may actually avoid the grand betrayal.</p>\r\n<p><strong>Krugman&rsquo;s column</strong></p>\r\n<p>Krugman&rsquo;s February 20, 2014 column was entitled &ldquo;<a href="http://www.nytimes.com/2014/02/21/opinion/krugman-the-stimulus-tragedy.html?hp&amp;rref=opinion">The Stimulus Tragedy</a>.&rdquo;&nbsp; It said pretty much what I just wrote above.&nbsp; Like Krugman, we expressed our views contemporaneously that the stimulus package was far too small.&nbsp; Because we don&rsquo;t have the same column length restrictions that Krugman must meet the readers of&nbsp;<em>New Economic Perspectives&nbsp;</em>have been able to read much more detailed explanations of how successful stimulus was in turning around the horrors of the Great Recession.&nbsp; The readers of Krugman or&nbsp;<em>New Economic Perspectives&nbsp;</em>would find equally familiar our overall analysis of stimulus and austerity because economists have known for 75 years, and policy has proved recurrently, that robust automatic stabilizers (which are fiscal) and specialized fiscal stimulus programs work effectively to reduce the length and severity of recessions.</p>\r\n<p>I do understand that Krugman doesn&rsquo;t work out of an office at the&nbsp;<em>NYT</em>, but if I can read his columns in Minnesota in frigid February, I am confident that Shear can read those same columns and could interview Krugman if he had any questions about Krugman&rsquo;s columns.&nbsp; I disagree with many dominant ideas in economics, so I&rsquo;m happy to read Shear&rsquo;s explanation of why he is an austerian despite economic theory and, as Krugman emphasizes in his column, the disastrous real world experiment with austerity in the eurozone that forced several nations of the periphery into gratuitous Great Depressions.</p>\r\n<p>I would be delighted to have Shear interview the Obama administration and report why it believes that &ldquo;balanced&rdquo; austerity is desirable and why it still favors the grand betrayal.&nbsp; It would be a fabulous journalistic enterprise to ask every member of Congress whether and why they thought stimulus succeeded or failed and whether they believe that the U.S. has run out of money.</p>\r\n<p><strong>The four tragic memes of austerity and stimulus</strong></p>\r\n<p>Krugman&rsquo;s column explains one aspect of the tragedy &ndash; the Republican&rsquo;s explicit, false meme that U.S. stimulus was a failure is now widely accepted even though it is utterly false.&nbsp; The data show a sharp break in the economic collapse during the Great Recession that makes perfect sense given expected lags as being the result of the stimulus program.&nbsp; As knowingly inadequate as the stimulus program was and as poorly designed as it was in terms of emphasis on far less effective (in increasing demand) tax cuts for the wealthy, it was still a substantial success.</p>\r\n<p>The second tragic meme is the claim that austerity has worked in the eurozone &ndash; when it forced the overall Eurozone into a second, gratuitous recession and one-third of the eurozone&rsquo;s total population into Great Depressions.&nbsp; The U.S. avoided these harms and experienced not only a sharp break in the collapse and a steady, albeit modest, recovery while one of our leading trading partners (the EU) went into the another recession, with much of it still suffering unemployment rates in excess of Great Depression levels.&nbsp; But the presentation I have given actually understates the case against austerity for the eurozone&rsquo;s initial response to the Great Recession was dominated by its automatic stabilizers &ndash; automatic fiscal stimulus.&nbsp; EU public expenditures rose due to the Great Recession costing millions of lost jobs while tax revenues fell.&nbsp; The EU initially rode that fiscal stimulus out of recession.&nbsp; The Eurozone, however, was plunged back into recession, and Italy, Spain, and Greece (collectively, one-third of the area&rsquo;s population) were forced into Great Depression levels of unemployment.&nbsp; They remain in Great Depression levels of unemployment roughly six years after the crisis face began.&nbsp; Worse, the EU&rsquo;s leading apologist for austerity, Ollie Rehn, recently predicted that under austerity it will take Spain ten years to emerge from the crisis phase (full employment would then still be years away).&nbsp; It takes astonishing&nbsp;<em>chutzpah</em>, but the<em>troika&nbsp;</em>(the EU Commission, the ECB, and the IMF) has most elites and media believing that causing a gratuitous eurozone-wide recession and a Great Depression to a vast swath of the region&rsquo;s population represents a &ldquo;success&rdquo; while the U.S. stimulus program that avoided a second recession (much less Great Depression) and returned the U.S. economy to growth years before the eurozone constitutes an epic failure. &nbsp;To the extent the eurozone&rsquo;s core may finally be crawling its way out of recession it is critical to recall that nearly all of the core nations continue to run budget deficits that help provide the minimal growth we are seeing in many of the core nations.</p>\r\n<p>Third, unemployment, poverty, large scale emigration of new university graduates, and record inequality all tend to disappear from consideration under the austerity meme.&nbsp; What is substituted is &ldquo;there is no alternative&rdquo; (TINA), which seeks to preempt debate and even thought.&nbsp; The plight of one-third the eurozone&rsquo;s population trapped in Great Depression levels of unemployment becomes a non-issue.&nbsp; There is no alternative: gut it out and stop whining.&nbsp; The curves of economic illiteracy and callousness are intersecting at their respective maxima under the&nbsp;<em>troika&rsquo;s&nbsp;</em>infliction of austerity.</p>\r\n<p>Fourth, the meme of Social Darwinism on steroids inevitably accompanies TINA, mass unemployment, and record inequality.&nbsp; The unemployed are the problem; mass unemployment is merely a symptom of their deficiencies.&nbsp; The unemployed lack proper skills, they are protected by labor laws, and they are paid too much.&nbsp; Their unions need to be crushed and wages reduced dramatically to make them more &ldquo;competitive.&rdquo;&nbsp; The&nbsp;<em>troika&nbsp;</em>is not only generating a race to the bottom of wages &ndash; it is proud that it has created the perverse incentives that generate the &ldquo;Road to Bangladesh&rdquo; for workers&rsquo; wages in the European periphery.</p>', '2014-02-23 04:20:26', 'ruck-2'),
(71, 'Huckle Bee Tuna Fish Sandwich', '<p>On Valentine&rsquo;s Day, Senator Bernie Sanders sent a letter&nbsp;<a title="Sanders: Don''t Cut SS" href="http://www.sanders.senate.gov/newsroom/recent-business/dear-mr-president-dont-cut-social-security-medicare-medicaid">to the President,</a>&nbsp;authored by himself and signed by 15 other Senators, all Democrats. The letter was a response to the rumors that the President intends to include his Chained CPI proposal to cut Social Security benefits in the budget he will soon send to Congress.&nbsp;<a title="Sanders: image of Letter on SS" href="http://www.sanders.senate.gov/download/letter-on-social-security-medicare-and-medicaid-2014?inline=file">It summarized:</a></p>\r\n<blockquote>\r\n<p>&ldquo;Mr. President: These are tough times for our country. With the middle class struggling and more people living in poverty than ever before, we urge you not to propose cuts in your budget to Social Security, Medicare, and Medicaid benefits which would make life even more difficult for some of the most vulnerable people in America.</p>\r\n<p>We look forward to working with you in support of the needs of the elderly, the children, the sick and the poor &ndash; and all working Americans.&rdquo;</p>\r\n</blockquote>', '<p>On Valentine&rsquo;s Day, Senator Bernie Sanders sent a letter&nbsp;<a title="Sanders: Don''t Cut SS" href="http://www.sanders.senate.gov/newsroom/recent-business/dear-mr-president-dont-cut-social-security-medicare-medicaid">to the President,</a>&nbsp;authored by himself and signed by 15 other Senators, all Democrats. The letter was a response to the rumors that the President intends to include his Chained CPI proposal to cut Social Security benefits in the budget he will soon send to Congress.&nbsp;<a title="Sanders: image of Letter on SS" href="http://www.sanders.senate.gov/download/letter-on-social-security-medicare-and-medicaid-2014?inline=file">It summarized:</a></p>\n<blockquote>\n<p>&ldquo;Mr. President: These are tough times for our country. With the middle class struggling and more people living in poverty than ever before, we urge you not to propose cuts in your budget to Social Security, Medicare, and Medicaid benefits which would make life even more difficult for some of the most vulnerable people in America.</p>\n<p>We look forward to working with you in support of the needs of the elderly, the children, the sick and the poor &ndash; and all working Americans.&rdquo;</p>\n</blockquote>\n<p>&nbsp;</p>\n<p>The letter also stated a number of the usual talking points made in arguments against cuts to Social Security. In addition, it also contained praise for the President for his actions in improving the economy, creating jobs, and reducing the deficit, and it mentioned some specifics, including reduction of the Federal deficit to less that half of the $1.4 Trillion deficit he began with. The letter also asserted the need to do much more, especially in the areas of the economy, reducing unemployment and wealth and income inequality, and reducing the deficit &ldquo;. . . in a fair way.&rdquo;</p>\n<p>It is a positive development that a group of Senators decided to preempt the President&rsquo;s budget offering stating their disagreement with any proposed cuts to SS, Medicare, and Medicaid, but I think there were a number of ways in which the letter could have been done more effectively. First, It would be great if progressives urging the President not to cut the safety net would stop reinforcing the frame that lower deficits are good and that the President is due praise for cutting the deficit so sharply (CBP projects a 3.0% of GDP deficit this fiscal year). It is not good that he has cut the deficit so much, because in doing so, he has subtracted from Federal Government additions of Net Financial Assets (NFAs) to the economy. These contributions are projected to be so low this year that they will only compensate for the demand leakage due to the trade deficit, leaving no additional NFAs for net aggregate private sector savings.</p>\n<p>Given the presence of unequal economic power to collect financial assets in the hands of economic elites, the implication of this is that the lower deficits will only further exacerbate inequality in the United States as well as contribute to continued high and long-term unemployment and stagnation (low growth) in the economy. In short, the austerians, including the President and other Democrats and Republicans who have been insisting on lower deficits are responsible fr the stagnation we see all around us.</p>\n<p>Second, the letter would also have been more effective, if it had more than 15 signatures on it. Many Democratic Senators are running for re-election this year. Do they really want to be running as one of the faces of a party whose head is advocating for cuts to Social Security? Is this really good for Kay Hagan, Jeanne Shaheen, Mary Landrieu, Mark Pryor, Mark Warner, Cory Booker, Tom Udall, Mark Udall, Chris Coons, and John Walsh? So why haven&rsquo;t they signed the letter? Do they really expect to re-elected if they decide to support a budget that contains chained CPI, and, even if they don&rsquo;t support it, will they benefit if their party leader is proposing chained CPI? So why wasn&rsquo;t Bernie Sanders able to get these additional signatures from Democrats who face challenges and are running this year?</p>\n<p>And third, this letter would have been much, much stronger if the Senators who signed it said to the President directly that they know that there is no short or long-term debt problem and hence no further need to worry about cutting the deficit to achieve fiscal sustainability or ficsal responsibility. And that they also know that any debts that the Treasury has incurred in the past, or deficits that it incurs in the future, can be either paid off as they fall due, or covered completely by revenues from High Value Platinum Coin Seigniorage (HVPCS) used under the authority provided by&nbsp;<a title="Law on denominations, specifications, etc." href="http://www.law.cornell.edu/uscode/text/31/5112">legislation on denominations, specifications, and design of coins,</a>&nbsp;passed in 1996. (Full details and issues surrounding HVPCS are given&nbsp;<a title="Fixing the Debt Without Breaking America" href="http://amzn.to/Z7kG5q">in my e-book.)</a>&nbsp;They also should have added that since there is never any need based on the idea that &ldquo;we&rsquo;re running out of money,&rdquo; to cut any safety net programs, that they want the President to know that everyone signing the letter is committed to voting to kill any budget offered by the President including the chained CPI, or any other provision cutting safety net programs.</p>\n<p>A letter enhanced in the three ways I&rsquo;ve just outlined would have been a damn sight more effective in warning Obama off the chained CPI, than the one Bernie Sanders and the other 15 Senators sent. And it also would have been much more effective in getting those Democratic Senators who signed it and are running, elected in November.</p>', '2014-02-21 06:35:46', 'huckle-bee-tuna-fish-sandwich'),
(69, 'this is a test', '<p>Ruckbeard</p>', '<p>Ruckbeard</p>', '2014-02-21 05:36:38', 'this-is-a-test');

-- --------------------------------------------------------

--
-- Table structure for table `blog_likes`
--

CREATE TABLE IF NOT EXISTS `blog_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=224 ;

--
-- Dumping data for table `blog_likes`
--

INSERT INTO `blog_likes` (`id`, `userId`, `postId`, `likes`) VALUES
(223, 10, 127, 1),
(202, 10, 69, 1),
(194, 10, 106, 1),
(195, 10, 107, 1),
(217, 10, 96, 1),
(183, 10, 97, 1),
(191, 10, 98, 1),
(55, 10, 71, 1),
(49, 10, 72, 1),
(116, 10, 73, 1),
(176, 10, 74, 1),
(52, 10, 77, 1),
(119, 10, 81, 1),
(79, 10, 78, 1),
(62, 10, 79, 1),
(115, 10, 80, 1),
(169, 10, 82, 1),
(204, 10, 116, 1),
(213, 10, 114, 1),
(220, 10, 125, 1),
(221, 10, 123, 1),
(222, 10, 124, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caetegory` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=215 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postId`, `name`, `email`, `comment`, `time`) VALUES
(136, 55, '', '', '', '2014-02-17 04:16:46'),
(135, 45, '', '', '', '2014-02-16 05:19:58'),
(6, 7, '', '', 'Ruck', '2014-02-05 10:23:29'),
(7, 6, '', '', 'Chuck', '2014-02-05 10:23:45'),
(8, 5, '', '', 'Write your comments here...', '2014-02-05 10:24:23'),
(9, 7, '', '', 'SELECT * FROM blog', '2014-02-05 10:29:58'),
(10, 7, '', '', '&lt;?php echo &quot;hi&quot; ?&gt;', '2014-02-05 10:30:43'),
(11, 7, '', '', '&quot;&quot;', '2014-02-05 10:31:32'),
(12, 7, '', '', '<?php echo ''hi'' ?>', '2014-02-05 10:34:08'),
(13, 7, '', '', 'SELECT * FROM blog', '2014-02-05 10:34:53'),
(14, 7, '', '', 'aa', '2014-02-05 10:35:21'),
(15, 7, '', '', 'Write your comments here...', '2014-02-05 20:29:41'),
(16, 4, '', '', 'Write your comments here...', '2014-02-05 20:29:50'),
(17, 7, '', '', 'Write your comments here...', '2014-02-06 03:02:46'),
(18, 7, '', '', 'Write your comments here...', '2014-02-06 03:02:51'),
(19, 7, '', '', 'Write your comments here...', '2014-02-06 03:02:55'),
(21, 0, '', '', 'Write your comments here...', '2014-02-06 05:14:23'),
(22, 7, '', '', 'Write your comments here...', '2014-02-06 05:17:20'),
(23, 7, '', '', 'chuck', '2014-02-06 05:19:48'),
(24, 7, '', '', 'ruck', '2014-02-06 05:20:01'),
(25, 7, '', '', 'Write your comments here...', '2014-02-06 05:25:34'),
(26, 7, '', '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2014-02-06 05:26:37'),
(27, 7, '', '', ' a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a', '2014-02-06 05:29:13'),
(28, 7, '', '', 'aaaaaaaa aa aaaaaaaaa aa aaaaaaaaaa aa aaaaaaaaa aa aaaaaaaaaa aa aaaaaaaaaaa aa aaaaaaa aa aaaaaaaaaaaaaaaaaa aa aaaaaaaaaaaa aa aaaaaaaaaaaa aa aaaaaaaaaa aa aaaaaaaaaaaaaaa aa aaaaaaaaaaa aa', '2014-02-06 05:42:20'),
(29, 7, '', '', '<a href="www.facebook.com">chuck</a>', '2014-02-06 08:23:42'),
(30, 7, '', '', ''';alert(String.fromCharCode(88,83,83))//'';alert(String.fromCharCode(88,83,83))//";\r\nalert(String.fromCharCode(88,83,83))//";alert(String.fromCharCode(88,83,83))//--\r\n></SCRIPT>">''><SCRIPT>alert(String.fromCharCode(88,83,83))</SCRIPT>', '2014-02-06 08:27:47'),
(31, 7, '', '', '%27%3B%61%6C%65%72%74%28%53%74%72%69%6E%67%2E%66%72%6F%6D%43%68%61%72%43%6F%64%65%28%38%38%2C%38%33%2C%38%33%29%29%2F%2F%27%3B%61%6C%65%72%74%28%53%74%72%69%6E%67%2E%66%72%6F%6D%43%68%61%72%43%6F%64%65%28%38%38%2C%38%33%2C%38%33%29%29%2F%2F%22%3B%0A%61%6C%65%72%74%28%53%74%72%69%6E%67%2E%66%72%6F%6D%43%68%61%72%43%6F%64%65%28%38%38%2C%38%33%2C%38%33%29%29%2F%2F%22%3B%61%6C%65%72%74%28%53%74%72%69%6E%67%2E%66%72%6F%6D%43%68%61%72%43%6F%64%65%28%38%38%2C%38%33%2C%38%33%29%29%2F%2F%2D%2D%0A%3E%3C%2F%53%43%52%49%50%54%3E%22%3E%27%3E%3C%53%43%52%49%50%54%3E%61%6C%65%72%74%28%53%74%72%69%6E%67%2E%66%72%6F%6D%43%68%61%72%43%6F%64%65%28%38%38%2C%38%33%2C%38%33%29%29%3C%2F%53%43%52%49%50%54%3E', '2014-02-06 08:28:29'),
(32, 7, '', '', ''''';!--"<XSS>=&{()}', '2014-02-06 08:29:33'),
(33, 7, '', '', '<SCRIPT SRC=http://ha.ckers.org/xss.js></SCRIPT>', '2014-02-06 08:30:28'),
(34, 7, '', '', '<IMG SRC="javascript:alert(''XSS'');">', '2014-02-06 08:30:57'),
(35, 7, '', '', '<IMG SRC=&#0000106&#0000097&#0000118&#0000097&#0000115&#0000099&#0000114&#0000105&#0000112&#0000116&#0000058&#0000097&\r\n#0000108&#0000101&#0000114&#0000116&#0000040&#0000039&#0000088&#0000083&#0000083&#0000039&#0000041>', '2014-02-06 08:31:43'),
(36, 7, '', '', 'Write your comments here...<IMG SRC=&#106;&#97;&#118;&#97;&#115;&#99;&#114;&#105;&#112;&#116;&#58;&#97;&#108;&#101;&#114;&#116;&#40;\r\n&#39;&#88;&#83;&#83;&#39;&#41;>', '2014-02-06 08:36:59'),
(37, 7, '', '', '<p>hi</p>', '2014-02-06 08:56:53'),
(38, 7, '', '', '<a href="http://www.facebook.com/">click</a>', '2014-02-06 08:57:22'),
(39, 7, '', '', '<iframe width="560" height="315" src="//www.youtube.com/embed/VyZjX2e7Kx8" frameborder="0" allowfullscreen></iframe>', '2014-02-06 09:11:04'),
(40, 7, '', '', '<span class="youtube-embed">VyZjX2e7Kx8<span>', '2014-02-06 09:31:52'),
(41, 9, '', '', 'Right now the President is trying to Fast Track the biggest trade deal since NAFTA - a trade deal that will dictate policies on the environment, labor standards, food safety, internet freedom, medicine costs, and a whole lot more.\r\n\r\nBut a recent study shows that mainstream media just isnâ€™t covering it: http://bit.ly/1lAIwrl \r\n\r\nThat means it is up to YOU to get the word out! Share this with your friends and tell them to go to www.ExposeTheTPP.org and www.StopFastTrackNow.org.', '2014-02-06 23:19:40'),
(42, 11, '', '', 'Write your comments here...', '2014-02-07 02:37:03'),
(43, 11, '', '', 'Write your comments here...', '2014-02-07 02:39:21'),
(44, 11, '', '', 'Write your comments here...', '2014-02-07 02:39:35'),
(45, 11, '', '', 'Write your comments here...', '2014-02-07 02:40:49'),
(46, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:07'),
(47, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:15'),
(48, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:16'),
(49, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:16'),
(50, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:16'),
(51, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:16'),
(52, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:17'),
(53, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:17'),
(54, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:17'),
(55, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:18'),
(56, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:18'),
(57, 10, '', '', 'Write your comments here...', '2014-02-07 02:41:18'),
(58, 11, '', '', 'Write your comments here...', '2014-02-07 02:42:10'),
(59, 11, '', '', 'Write your comments here...', '2014-02-07 02:42:18'),
(60, 11, '', '', 'Write your comments here...', '2014-02-07 02:56:43'),
(61, 11, '', '', 'Write your comments here...', '2014-02-07 02:56:54'),
(62, 11, '', '', 'Write your comments here...', '2014-02-07 02:57:33'),
(63, 11, '', '', 'Write your comments here...', '2014-02-07 02:57:39'),
(64, 11, '', '', 'Write your comments here...', '2014-02-07 02:58:34'),
(65, 11, '', '', 'Write your comments here...', '2014-02-07 02:58:40'),
(66, 11, '', '', 'Write your comments here...', '2014-02-07 03:01:29'),
(67, 13, '', '', 'Write your comments here...', '2014-02-07 03:02:20'),
(68, 13, '', '', 'Write your comments here...', '2014-02-07 03:02:21'),
(69, 13, '', '', 'Write your comments here...', '2014-02-07 03:02:22'),
(70, 13, '', '', 'Write your comments here...', '2014-02-07 03:02:23'),
(71, 13, '', '', 'Write your comments here...', '2014-02-07 03:02:23'),
(72, 13, '', '', 'Write your comments here...', '2014-02-07 03:02:24'),
(73, 13, '', '', 'Write your comments here...', '2014-02-07 03:02:24'),
(74, 13, '', '', 'Write your comments here...', '2014-02-07 03:02:25'),
(75, 13, '', '', 'Write your comments here...', '2014-02-07 03:02:25'),
(76, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:02'),
(77, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:03'),
(78, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:03'),
(79, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:04'),
(80, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:04'),
(81, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:04'),
(82, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:05'),
(83, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:05'),
(84, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:05'),
(85, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:05'),
(86, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:06'),
(87, 13, '', '', 'Write your comments here...', '2014-02-07 03:03:06'),
(88, 8, '', '', 'Write your comments here...', '2014-02-10 05:19:18'),
(89, 43, '', '', 'Write your comments here...When you start building significant pieces of your game beyond the basic login and registration systems, you start to realize that youâ€™re copying and pasting the basic layout of your pages a lot. Wouldnâ€™t it be nice to have a template that you can drop all of the unique content into, and re-use on every page?<br /><br />\r\n\r\nThe answer is that you can â€“ and should. It will help you separate your design from your code, which(if youâ€™re anything like me) means that you can have someone with actual designing skills come through and fix up your template before you push your site out to the rest of the world.\r\n\r\nThis will be a brief rundown on how to get up and running with a templating engine, which is what we will be using to build all of the other parts of our browsergame in progress. For a PHP templating engine, Iâ€™ve chosen Smarty. I did this by taking a look at Smartyâ€™s list of features, and deciding whether I liked them or not â€“ when you choose a templating engine, thatâ€™s really all the forethought you need to put into it â€“ will it work for you, and are you okay with working with it? As an aside, if you donâ€™t like your templating system you can always switch systems for your next project.\r\n\r\nA lot of developers are fans of â€œrolling their ownâ€ templating system. While this can definitely work, youâ€™re probably going to make larger gains by simply using an existing one â€“ if you need anyone to help you with your game later(or it really takes off and you hire someone), it will be a benefit to be using a system that they might already know as opposed to a proprietary system. Also, why do all that work when itâ€™s already been done for you?\r\n\r\nThe Smarty website has a smarty quick start tutorial, which you can use to get yourself up and running with Smarty.\r\n\r\nOnce youâ€™ve gotten Smarty set up on your system, weâ€™ll be building the index page that our login page from earlier redirects to for non-administrator users. To start off with, weâ€™ll just use the testing index.tpl file from the Smarty quick start:', '2014-02-10 06:34:46'),
(90, 43, '', '', 'When you start building significant pieces of your game beyond the basic login and registration systems, you start to realize that youâ€™re copying and pasting the basic layout of your pages a lot. Wouldnâ€™t it be nice to have a template that you can drop all of the unique content into, and re-use on every page?rnrnThe answer is that you can â€“ and should. It will help you separate your design from your code, which(if youâ€™re anything like me) means that you can have someone with actual designing skills come through and fix up your template before you push your site out to the rest of the world.rnrnThis will be a brief rundown on how to get up and running with a templating engine, which is what we will be using to build all of the other parts of our browsergame in progress. For a PHP templating engine, Iâ€™ve chosen Smarty. I did this by taking a look at Smartyâ€™s list of features, and deciding whether I liked them or not â€“ when you choose a templating engine, thatâ€™s really all the forethought you need to put into it â€“ will it work for you, and are you okay with working with it? As an aside, if you donâ€™t like your templating system you can always switch systems for your next project.rnrnA lot of developers are fans of â€œrolling their ownâ€ templating system. While this can definitely work, youâ€™re probably going to make larger gains by simply using an existing one â€“ if you need anyone to help you with your game later(or it really takes off and you hire someone), it will be a benefit to be using a system that they might already know as opposed to a proprietary system. Also, why do all that work when itâ€™s already been done for you?rnrnThe Smarty website has a smarty quick start tutorial, which you can use to get yourself up and running with Smarty.rnrnOnce youâ€™ve gotten Smarty set up on your system, weâ€™ll be building the index page that our login page from earlier redirects to for non-administrator users. To start off with, weâ€™ll just use the testing index.tpl file from the Smarty quick start:', '2014-02-10 06:41:50'),
(91, 59, '', '', '<p>Write your comments here...</p>', '2014-02-10 08:43:38'),
(92, 59, '', '', '<p>Hello</p>rn<p>&nbsp;</p>rn<p>Chumbeer</p>', '2014-02-10 08:44:06'),
(93, 59, '', '', '<p>EWLEFJW<br /><br /><br />EWFIKWJEIFJEW</p>\r\n<p>fFDF</p>\r\n<p>&nbsp;</p>\r\n<p>dsf</p>\r\n<p>d</p>', '2014-02-10 08:44:38'),
(94, 59, '', '', '<p>&lt;a href="Chuck.php"&gt;Chuck&lt;/a&gt;</p>', '2014-02-10 08:45:11'),
(95, 59, '', '', '<p>http://www.facebook.com</p>', '2014-02-10 18:49:36'),
(96, 59, '', '', '<pre style="font-family: monospace, Courier; padding: 1em; border: 1px dashed #2f6fab; background-color: #f9f9f9; line-height: 1.3em; font-size: 13px;">&lt;BODY ONLOAD=alert(''XSS'')&gt;</pre>', '2014-02-11 04:23:34'),
(97, 7, '', '', '<pre style="font-family: monospace, Courier; padding: 1em; border: 1px dashed #2f6fab; background-color: #f9f9f9; line-height: 1.3em; font-size: 13px;">&lt;IMG SRC=j&amp;#X41vascript:alert(''test2'')&gt;</pre>', '2014-02-11 04:27:53'),
(98, 61, '', '', 'Why a website defending government?  Because, like many Americans, I am tired of the government bashing that is constantly coming from the political right.  For decades conservatives have been demonizing government and not enough has been done to defend it.  Ever since Ronald Reagan declared in 1981 that &quot;Government is not a solution to our problem, government is the problem,&quot; Republicans have been waging a political war against this institution. They have been joined in this anti-government crusade by libertarian thinkers, Tea Party activists, right-wing media pundits, and wealthy corporate lobbies.  This powerful political coalition blithely ignores anything good about government and conducts a relentless smear campaign against this institution.  They constantly play upon the fears and insecurities of average Americans and encourage them to blame all their problems on big bad government.', '2014-02-11 05:04:45'),
(99, 61, '', '', 'Why a website defending government?  Because, like many Americans, I am tired of the government bashing that is constantly coming from the political right.  For decades conservatives have been demonizing government and not enough has been done to defend it.  Ever since Ronald Reagan declared in 1981 that &quot;Government is not a solution to our problem, government is the problem,&quot; Republicans have been waging a political war against this institution. They have been joined in this anti-government crusade by libertarian thinkers, Tea Party activists, right-wing media pundits, and wealthy corporate lobbies.  This powerful political coalition blithely ignores anything good about government and conducts a relentless smear campaign against this institution.  They constantly play upon the fears and insecurities of average Americans and encourage them to blame all their problems on big bad government.\r\nMake no mistake: the goal of this anti-government movement is not merely to eliminate waste or make the government more efficient.  The ultimate aim is to undo many of the basic government programs that have been in place since the New Deal and the Great Society. They want to slash spending on vital safety net programs like Medicare, Medicaid, and Social Security.  They would like to roll back key regulations protecting consumers, workers, and the environment.  And they want to reduce taxes so drastically that funding any new government programs would become extremely difficult.', '2014-02-11 05:05:09'),
(100, 61, '', '', 'Write your comments here...\r\n\r\n<b>test</b>', '2014-02-11 05:11:03'),
(101, 61, '', '', 'Write your comments here...', '2014-02-11 05:13:47'),
(102, 61, '', '', '<i>yahoo</i>', '2014-02-11 05:14:05'),
(103, 61, '', '', 'http:/www.yahoo.com', '2014-02-11 05:18:31'),
(104, 61, '', '', 'http://www.yahoo.com', '2014-02-11 05:19:17'),
(105, 61, '', '', 'Write your comments here...', '2014-02-11 05:22:35'),
(106, 61, '', '', 'test', '2014-02-11 05:25:37'),
(107, 61, '', '', 'http://www.yahoo.com', '2014-02-11 05:25:44'),
(108, 61, '', '', '[b]test[/b]', '2014-02-11 05:25:56'),
(109, 61, '', '', '[i]test[/i]', '2014-02-11 05:26:17'),
(110, 61, '', '', '[url=http://www.yahoo.com]test[/url]', '2014-02-11 05:26:47'),
(111, 61, '', '', 'Write your comments here...', '2014-02-11 05:27:42'),
(112, 61, '', '', 'Write your comments here...', '2014-02-11 05:27:46'),
(113, 61, '', '', 'Write your comments here...', '2014-02-11 05:27:47'),
(114, 61, '', '', 'Write your comments here...', '2014-02-11 05:34:58'),
(115, 61, '', '', 'Write your comments here...\r\n\r\nWrite your comments here...', '2014-02-11 05:35:10'),
(116, 61, '', '', '[b]bold[/B] [i]italics[/I] [url=http://www.yahoo.com][b][i]test[/i][/b][/url]', '2014-02-11 07:17:03'),
(117, 60, '', '', 'Write your comments here...', '2014-02-11 07:39:38'),
(118, 60, '', '', 'Post', '2014-02-11 07:39:50'),
(119, 60, '', '', '[b]Post[/b]\r\n\r\nasd\r\n\r\ndasf\r\n\r\nafs\r\n\r\ndfas\r\n\r\n\r\nsdf\r\nasdf\r\nd\r\nfas\r\ndsf\r\nasd\r\nf\r\n\r\n\r\ndsfa\r\n', '2014-02-11 07:40:24'),
(120, 60, '', '', 'Showing results for USDA Climate Hubs For Risk Adaptation and Mitigation to Climate Change.\r\nSearch instead for UDSA Climate Hubs For Risk Adaptation and Mitigation to Climate Change.\r\n\r\nSearch Results\r\nUSDA | OCE | Climate Change | USDA Regional Climate Hubs\r\nwww.usda.gov/.../climate_change/region...â€Ž\r\nUnited States Department...\r\nUSDA Climate Hubs for risk Adaptation and Mitigation to Climate Change ... ranchers and forest landowners to help them adapt to climate change and weather ...\r\n[PDF]\r\nUSDA Regional Hubs for Risk Adaptation and Mitigation to Climate ...\r\nwww.usda.gov/.../climate_change/hubs/...â€Ž\r\nUnited States Department...\r\nUSDA Regional Hubs for Risk Adaptation and. Mitigation to Climate Change. USDA''s Regional Hubs will deliver science-based knowledge and practical ...\r\nSecretary Vilsack Announces Regional Hubs to Help Agriculture ...\r\nwww.usda.gov/2014/02/0016.xmlâ€Ž\r\nUnited States Department...\r\n5 days ago - ... Hubs for Risk Adaptation and Mitigation to Climate Change at seven locations around ... to Help Agriculture, Forestry Mitigate the Impacts of a Changing Climate ... "USDA''s Climate Hubs are part of our broad commitment to ...\r\n[PDF]\r\nUSDA Regional Hubs for Risk Adaptation and Mitigation to Cli', '2014-02-11 07:43:05'),
(121, 60, '', '', '.transparent {\r\n	/* Required for IE 5, 6, 7 */\r\n	/* ...or something to trigger hasLayout, like zoom: 1; */\r\n	width: 100%; \r\n		\r\n	/* Theoretically for IE 8 & 9 (more valid) */	\r\n	/* ...but not required as filter works too */\r\n	/* should come BEFORE filter */\r\n	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";\r\n	\r\n	/* This works in IE 8 & 9 too */\r\n	/* ... but also 5, 6, 7 */\r\n	filter: alpha(opacity=50);\r\n	\r\n	/* Older than Firefox 0.9 */\r\n	-moz-opacity:0.5;\r\n	\r\n	/* Safari 1.x (pre WebKit!) */\r\n	-khtml-opacity: 0.5;\r\n    \r\n	/* Modern!\r\n	/* Firefox 0.9+, Safari 2?, Chrome any?\r\n	/* Opera 9+, IE 9+ */\r\n	opacity: 0.5;\r\n}', '2014-02-11 07:46:14'),
(122, 59, '', '', 'test[/b]', '2014-02-11 19:09:54'),
(123, 59, '', '', '[b]test', '2014-02-11 19:10:07'),
(124, 61, '', '', '<b>hello</b>', '2014-02-12 19:28:39'),
(125, 61, '', '', '<script>alert:xxs</script>', '2014-02-12 19:28:59'),
(126, 61, '', '', '<script></script>', '2014-02-12 19:43:35'),
(127, 61, '', '', '[b]bold[/b]', '2014-02-12 19:47:34'),
(128, 61, '', '', '<b>[b]bold[/b]</b>\r\n\r\nhttp://www.yahoo.com', '2014-02-12 22:19:28'),
(129, 61, '', '', 'http://www.yahoo.com', '2014-02-12 22:22:32'),
(130, 61, '', '', 'http://www.yahoo.com', '2014-02-12 22:23:23'),
(131, 61, '', '', 'asdfdsaf http://www.yahoo.com', '2014-02-13 00:31:30'),
(132, 50, '', '', 'Write your comments here...', '2014-02-13 13:09:21'),
(133, 61, '', '', '<a href="http://www.sherv.net/"><img alt="Problem Troll" width=150 height=154 src="http://www.sherv.net/cm/emoticons/trollface/problem-troll-smiley-emoticon.jpg"></a>', '2014-02-14 02:23:12'),
(134, 61, '', '', '<a href="http://www.sherv.net/"><img alt="Angry smiley giving middle finger" src="http://www.sherv.net/cm/emo/rude/1/angry.gif"></a>', '2014-02-14 04:30:37'),
(137, 56, '', '', 'asdf', '2014-02-17 04:24:56'),
(138, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\n\r\nhttp://www.google.com', '2014-02-17 04:25:23'),
(139, 56, '', '', 'asdf\r\na\r\nasdf', '2014-02-17 04:25:39'),
(140, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.comr</a>r\nhttp://www.google.com', '2014-02-17 04:25:54'),
(141, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\nhttp://www.google.com', '2014-02-17 04:26:02'),
(142, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\nhttp://www.google.com', '2014-02-17 04:26:10'),
(143, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\n\r\nhttp://www.google.com\r\n', '2014-02-17 04:26:22'),
(144, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\n\r\nhttp://www.google.com\r\n', '2014-02-17 05:12:54'),
(145, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\n\r\nhttp://www.google.com', '2014-02-17 05:13:59'),
(146, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\n\r\nhttp://www.google.com', '2014-02-17 05:18:32'),
(147, 56, '', '', 'asdf\r\n\r\nasdfafds\r\n\r\nafsd\r\nasdf\r\nsdfa\r\nsfad\r\n', '2014-02-17 05:55:28'),
(148, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\n\r\nhttp://www.google.com', '2014-02-17 06:14:04'),
(149, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\n\r\nhttp://www.google.com', '2014-02-17 06:14:39'),
(150, 56, '', '', 'asdf\r\n\r\nadsf', '2014-02-18 05:24:57'),
(151, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.com</a>r\n\r\nhttp://www.google.com\r\n', '2014-02-18 05:25:12'),
(152, 56, '', '', 'adf\r\n\r\ndfas', '2014-02-18 05:26:00'),
(153, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a><a href=""> http://www.facebook.comr</a>r\n\r\nhttp://www.google.com', '2014-02-18 05:37:00'),
(154, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a> http://www.facebook.com\r\n\r\nhttp://www.google.com', '2014-02-18 05:38:05'),
(155, 56, '', '', '<a href="http://www.yahoo.com">http://www.yahoo.com</a> http://www.facebook.com\r\n\r\nhttp://www.google.com\r\n', '2014-02-18 05:42:28'),
(156, 56, '', '', 'http://www.yahoo.com http://www.facebook.com\r\n\r\nhttp://www.google.com\r\n', '2014-02-18 05:44:18'),
(157, 56, '', '', 'http://www.yahoo.com http://www.facebook.com\r\n\r\nhttp://www.google.com\r\n', '2014-02-18 05:48:14'),
(158, 56, '', '', '<a href="http://www.yahoo.com">yahoo</a>', '2014-02-18 05:48:35'),
(159, 56, '', '', '$comment = nl2br($comment, true);', '2014-02-18 05:50:43'),
(160, 56, '', '', '$comment = nl2br($comment, true);\r\n\r\n$comment = nl2br($comment, true);', '2014-02-18 05:50:56'),
(161, 56, '', '', 'http://www.yahoo.com http://www.facebook.com', '2014-02-18 05:54:25'),
(162, 56, '', '', 'http://www.yahoo.com http://www.facebook.com\r\n\r\nhttp://www.google.com', '2014-02-18 05:55:20'),
(163, 56, '', '', 'http://www.yahoo.com http://www.facebook.com\r\n\r\nhttp://www.google.com', '2014-02-18 05:55:26'),
(164, 56, '', '', 'http://www.yahoo.com http://www.facebook.com\r\nhttp://www.google.com', '2014-02-18 05:55:34'),
(165, 59, '', '', '<BODY ONLOAD=alert(''XSS'')>', '2014-02-20 04:36:59'),
(166, 67, '', '', 'asdf', '2014-02-21 05:26:42'),
(167, 69, '', '', 'asdf', '2014-02-21 06:32:43'),
(168, 71, '', '', 'asd', '2014-02-21 06:36:22'),
(169, 71, '', '', 'asdf', '2014-02-21 09:51:22'),
(170, 69, '', '', 'asdf', '2014-02-21 09:57:02'),
(171, 74, '', '', 'SELECT * FROM blog', '2014-02-24 01:10:46'),
(172, 74, '', '', 'asdf', '2014-02-24 04:23:50'),
(173, 74, '', '', 'asdf', '2014-02-24 04:26:34'),
(174, 74, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdf', '2014-02-24 04:29:47'),
(175, 74, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdf', '2014-02-24 04:47:34'),
(176, 74, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdf\r\nasdf\r\nasdf\r\nsdaf\r\ndssdaf\r\ndssdaf\r\ndssdaf\r\ndssdaf\r\ndssdaf\r\ndssdafsdaf\r\ndssdaf\r\ndssdaf\r\nds\r\ndssdaf\r\ndssdaf\r\ndssdafsdaf\r\nds\r\ndssdaf\r\ndssdafsdaf\r\nds\r\ndssdaf\r\ndssdaf\r\ndssdaf\r\ndssdaf\r\nds\r\ndasf\r\n\r\ndfas\r\nasdf\r\n', '2014-02-24 05:08:25'),
(177, 74, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf\r\n', '2014-02-24 05:09:17'),
(178, 74, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf', '2014-02-24 05:09:35'),
(179, 74, '', '', 'asdf', '2014-02-24 05:10:30'),
(180, 74, 'asdf', '', 'asdf', '2014-02-24 05:34:21'),
(181, 74, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'l', '2014-03-06 10:57:18'),
(182, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdfdasdfsa', '2014-03-06 11:10:06'),
(183, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'aasdfasfasdf', '2014-03-06 11:10:37'),
(184, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'aasdfasfasdf', '2014-03-06 11:10:41'),
(185, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'aasdfasfasdf', '2014-03-06 11:10:43'),
(186, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'aasdfasfasdf', '2014-03-06 11:10:46'),
(187, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'aasdfasfasdf', '2014-03-06 11:10:48'),
(188, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'aasdfasfasdf', '2014-03-06 11:10:52'),
(189, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'ruck', '2014-03-06 11:18:46'),
(190, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'buck', '2014-03-06 11:18:53'),
(191, 78, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'chuck', '2014-03-06 11:19:01'),
(192, 82, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdf', '2014-03-06 23:18:57'),
(193, 82, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asd', '2014-03-06 23:43:32'),
(194, 81, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdffa', '2014-03-09 06:37:01'),
(195, 74, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'Fourth, the meme of Social Darwinism on steroids inevitably accompanies TINA, mass unemployment, and record inequality.  The unemployed are the problem; mass unemployment is merely a symptom of their deficiencies.  The unemployed lack proper skills, they are protected by labor laws, and they are paid too much.  Their unions need to be crushed and wages reduced dramatically to make them more â€œcompetitive.â€  The troika is not only generating a race to the bottom of wages â€“ it is proud that it has created the perverse incentives that generate the â€œRoad to Bangladeshâ€ for workersâ€™ wages in the European periphery.', '2014-03-09 06:56:59'),
(196, 74, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'The second tragic meme is the claim that austerity has worked in the eurozone â€“ when it forced the overall Eurozone into a second, gratuitous recession and one-third of the eurozoneâ€™s total population into Great Depressions.  The U.S. avoided these harms and experienced not only a sharp break in the collapse and a steady, albeit modest, recovery while one of our leading trading partners (the EU) went into the another recession, with much of it still suffering unemployment rates in excess of Great Depression levels.  But the presentation I have given actually understates the case against austerity for the eurozoneâ€™s initial response to the Great Recession was dominated by its automatic stabilizers â€“ automatic fiscal stimulus.  EU public expenditures rose due to the Great Recession costing millions of lost jobs while tax revenues fell.  The EU initially rode that fiscal stimulus out of recession.  The Eurozone, however, was plunged back into recession, and Italy, Spain, and Greece (collectively, one-third of the areaâ€™s population) were forced into Great Depression levels of unemployment.  They remain in Great Depression levels of unemployment roughly six years after the crisis face began.  Worse, the EUâ€™s leading apologist for austerity, Ollie Rehn, recently predicted that under austerity it will take Spain ten years to emerge from the crisis phase (full employment would then still be years away).  It takes astonishing chutzpah, but thetroika (the EU Commission, the ECB, and the IMF) has most elites and media believing that causing a gratuitous eurozone-wide recession and a Great Depression to a vast swath of the regionâ€™s population represents a â€œsuccessâ€ while the U.S. stimulus program that avoided a second recession (much less Great Depression) and returned the U.S. economy to growth years before the eurozone constitutes an epic failure.  To the extent the eurozoneâ€™s core may finally be crawling its way out of recession it is critical to recall that nearly all of the core nations continue to run budget deficits that help provide the minimal growth we are seeing in many of the core nations.', '2014-03-09 21:04:25'),
(197, 94, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'a', '2014-03-10 06:27:25'),
(198, 94, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'af', '2014-03-10 06:43:46'),
(199, 98, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'a', '2014-03-10 20:15:08'),
(200, 93, 'Anonymous', '', 'a', '2014-03-10 20:16:21'),
(201, 94, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'a', '2014-03-10 20:52:18'),
(202, 98, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'l', '2014-03-10 21:41:19'),
(203, 98, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'a', '2014-03-11 00:17:57'),
(204, 97, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'a', '2014-03-11 00:20:15'),
(208, 107, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'adsf', '2014-03-11 22:09:50'),
(209, 107, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'adsf', '2014-03-11 22:18:19'),
(210, 107, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdf', '2014-03-11 22:18:21'),
(211, 72, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'To reiterate, I have no problem with Shear, after acknowledging these facts, adopting and defending a different view.  It is intellectually dishonest and a disservice to the readers, however, to frame the issue in a way that the issue disappears.  It is not acceptable to have the Great Recession or unemployment disappear from consideration under Shearâ€™s framing.  This is how Shear presents the issue of whether Obama will begin to unravel the safety net by cutting future Social Security payments that would have normally risen to cover lost purchasing power due to inflation.\r\n\r\nâ€œâ€˜This reaffirms what has become all too apparent: The president has no interest in doing anything, even modest, to address our looming debt crisis,â€™ said Brendan Buck, a spokesman for the House speaker, John A. Boehner of Ohio.â€\r\n\r\nNotice that Shear treats the â€œlooming debt crisisâ€ and desirability of deficit reduction as facts so obviously true that they require no analysis.  There is no â€œlooming debt crisisâ€ for the U.S. government and the deficit has been reduced too quickly.  Notice that Shear implicitly treats federal budget deficits as harmful.  There are circumstances where that could be true due to inflation and very high capacity utilization.  We are not remotely in those circumstances.\r\n\r\nShear quotes the even more revealing, and financially illiterate, series of statements by the administration and its critics.\r\n\r\nâ€œThe budget plan, which will be out in early March, a month late, will abide by the overall spending guidelines agreed to by Republicans and Democrats late last year. But included in those spending limits will be a $56 billion proposal to increase spending on some of Mr. Obamaâ€™s key initiatives, officials said.\r\n\r\nMr. Earnest [Obamaâ€™s wondrously named deputy press flack] said that would include spending on manufacturing â€˜hubsâ€™ that the president has promoted over the last year; additional government programs aimed at helping people develop new skills; and funding for early childhood education programs like preschool.\r\n\r\nMr. Earnest said this new spending would be offset by revenue increases, and cuts in other parts of the budget.\r\n\r\nâ€˜This initiative that the president will propose will be fully paid for,â€™ Mr. Earnest said. White House officials declined to describe the revenue increases, but said they would include closing corporate loopholes, a move the president has supported in the past.\r\n\r\nMr. Buck [Boehnerâ€™s wondrously named aide] criticized the $56 billion proposal as another effort by the president to spend more taxpayer money than the governmen', '2014-03-11 22:22:23'),
(212, 72, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asd', '2014-03-11 22:22:33'),
(213, 72, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'Fourth, the meme of Social Darwinism on steroids inevitably accompanies TINA, mass unemployment, and record inequality.  The unemployed are the problem; mass unemployment is merely a symptom of their deficiencies.  The unemployed lack proper skills, they are protected by labor laws, and they are paid too much.  Their unions need to be crushed and wages reduced dramatically to make them more â€œcompetitive.â€  The troika is not only generating a race to the bottom of wages â€“ it is proud that it has created the perverse incentives that generate the â€œRoad to Bangladeshâ€ for workersâ€™ wages in the European periphery.', '2014-03-11 22:22:43'),
(214, 117, 'Ruckbeard', 'xxxrufioxx@yahoo.com', 'asdf', '2014-03-14 02:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE IF NOT EXISTS `comment_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `commentId` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `admin`, `email`, `create_date`, `password`, `last_name`, `first_name`, `name`, `class`) VALUES
(17, 0, 'b@b.com', '2014-02-03 00:34:58', '$1$6n2.V33.$m.hfbb06zVsbNfkxRQQVk1', 'a', 'a', 'Ruckbeard', 'warrior'),
(13, 0, 'xxxrufioxx@aim.com', '2014-02-02 16:10:50', '$1$5m0.oS2.$1gnhYtcdluZEO1uzcq17i/', 'Beard', 'Ruck', '', ''),
(12, 0, 'kvwulp@gmail.com', '2014-02-02 15:54:44', '$1$uO/.fZ..$2EVxM5GXb/vm0b4XqKG6m/', 'VanderWulp', 'Kevin', 'Ruckbeard', 'warrior'),
(10, 1, 'xxxrufioxx@yahoo.com', '2014-02-02 15:02:55', 'P0fZl2PFnuKUU', 'VanderWulp', 'Kevin', 'Ruckbeard', 'Warrior'),
(11, 0, 'a@a.com', '2014-02-02 15:03:44', 'P0fZl2PFnuKUU', 'VanderWulp', 'Kevin', 'Ruckbeard', 'Warrior'),
(18, 0, 'c@c.com', '2014-02-03 00:45:52', '$1$4G4.533.$XbjKOGPmiqbrhh4h0qICb1', 'a', 'a', 'c', 'gladiator'),
(19, 0, 'q@q.com', '2014-02-19 18:46:06', '$1$o1/.R.2.$cwrEdo5yJqxM5kSwlvegI/', 'VanderWulp', 'Kevin', '', ''),
(20, 0, 'r@r.com', '2014-02-19 20:07:10', '$1$PB1.sT2.$eUa0wZHSUhAS4NcJHH1Il1', 'Beard', 'Ruck', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE IF NOT EXISTS `post_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=733 ;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `tagId`, `postId`) VALUES
(95, 30, 126),
(2, 15, 116),
(3, 13, 116),
(4, 33, 116),
(5, 35, 116),
(6, 15, 118),
(732, 77, 127),
(167, 18, 72),
(731, 63, 127),
(730, 62, 127),
(166, 34, 119),
(165, 35, 119),
(98, 14, 126),
(164, 32, 119),
(163, 31, 119),
(162, 30, 119),
(161, 17, 119),
(729, 60, 127),
(160, 15, 119),
(159, 3, 119),
(158, 4, 119),
(157, 33, 119),
(156, 13, 119),
(155, 14, 119),
(728, 61, 127),
(727, 59, 127),
(154, 39, 119),
(726, 58, 127),
(725, 57, 127),
(153, 18, 119),
(152, 36, 119),
(151, 38, 119),
(724, 56, 127),
(69, 3, 122),
(68, 14, 121),
(67, 34, 121),
(66, 4, 121),
(65, 3, 121),
(723, 18, 127),
(722, 35, 127),
(721, 64, 127),
(150, 28, 119),
(149, 27, 119),
(148, 37, 119),
(720, 15, 127),
(719, 65, 127),
(718, 36, 127),
(717, 37, 127),
(716, 31, 127),
(147, 16, 119),
(715, 14, 127),
(714, 75, 127),
(713, 68, 127),
(712, 32, 127),
(711, 74, 127),
(710, 72, 127),
(647, 75, 120),
(646, 78, 120),
(645, 14, 120),
(644, 27, 120),
(709, 33, 127),
(708, 27, 127),
(643, 13, 120),
(71, 32, 123),
(72, 36, 123),
(73, 13, 123),
(74, 18, 124),
(707, 28, 127),
(76, 17, 124),
(706, 17, 127),
(705, 16, 127),
(79, 35, 125),
(704, 67, 127),
(81, 18, 125),
(96, 3, 126),
(83, 37, 125),
(84, 36, 125),
(85, 27, 125),
(86, 38, 125),
(87, 15, 125),
(88, 3, 125),
(703, 69, 127),
(90, 34, 125),
(91, 13, 125),
(702, 70, 127),
(93, 16, 125),
(94, 14, 125),
(701, 4, 127),
(700, 71, 127),
(699, 73, 127),
(698, 13, 127),
(697, 30, 127),
(696, 66, 127),
(695, 34, 127),
(694, 38, 127),
(693, 3, 127),
(692, 78, 127),
(691, 39, 127),
(642, 17, 120),
(641, 33, 120),
(648, 77, 120);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `baseUrl` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`baseUrl`) VALUES
('http://127.0.0.1/ruckbeard/');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` text,
  `short_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `display_name`, `short_name`) VALUES
(1, 'Attack', 'atk'),
(2, 'Defense', 'def'),
(3, 'Max HP', 'mhp'),
(4, 'Current HP', 'chp');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(72, '33513'),
(71, '5151515'),
(3, '@#@EEED'),
(4, 'casdf33'),
(30, 'a'),
(31, 'b'),
(32, 'c'),
(33, 'd'),
(34, 'e'),
(73, '515313'),
(13, '6q yq34'),
(14, '4qg43q'),
(15, 'gaa44'),
(16, '4213fg'),
(17, '`22'),
(18, '24'),
(70, '985'),
(69, '83'),
(35, 'f'),
(36, 'g'),
(37, 'h'),
(68, '7853'),
(27, 'gq@#t#'),
(28, '#######$@e'),
(38, 'i'),
(39, 'j'),
(56, 'aew'),
(57, 'aaaa3'),
(58, '3'),
(59, '4'),
(60, '1'),
(61, '5'),
(62, '6'),
(63, '7'),
(64, '8'),
(65, '9'),
(66, '457'),
(67, '475'),
(74, '51331'),
(75, '3333351'),
(78, '&lt;!++separator++&gt;'),
(77, '&lt;span class=''tag''&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `user_stats`
--

CREATE TABLE IF NOT EXISTS `user_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `stat_id` int(11) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
