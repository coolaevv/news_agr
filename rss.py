#!c:/python38/python.exe
# -*- coding: utf-8 -*- 
from bs4 import BeautifulSoup
import requests
import sys
import pymysql
import pymysql.cursors
import lxml.etree as et
import re

connection = pymysql.connect(host='localhost', user='root', password='', db='news', charset='utf8', cursorclass=pymysql.cursors.DictCursor)
cursor = connection.cursor()
i = 0

links =[
'https://ngs.ru/rss',
'https://theins.ru/rss',
'https://lenta.ru/rss',
'http://tass.ru/rss/v2.xml',
'http://static.feed.rbc.ru/rbc/logical/footer/news.rss'
]
for src in links:
	get_cont = requests.get(src)
	soup = BeautifulSoup(get_cont.text, "lxml-xml").find_all('item')
	for item in reversed(soup):
		title = item.find('title').text
		link = item.find('link').text
		try:
			soup_full = BeautifulSoup(requests.get(link).text, "lxml")
			if src == 'https://ngs.ru/rss':
				div_txt = soup_full.find("div", {"itemprop": "articleBody"}).text
				name_src = 'НГС'
			if src == 'https://theins.ru/rss':
				div_txt = soup_full.find("div", {"itemprop": "description"}).text
				name_src = 'The Insider'
			if src == 'https://lenta.ru/rss':
				div_txt = soup_full.find("div", {"itemprop": "articleBody"}).text
				name_src = 'Lenta.ru'
			if src == 'http://tass.ru/rss/v2.xml':
				div_txt = soup_full.find("div", {"class": "text-block"}).text
				name_src = 'ТАСС'
			if src == 'http://static.feed.rbc.ru/rbc/logical/footer/news.rss':
				div_txt = soup_full.find("div", {"itemprop": "articleBody"}).text
				name_src = 'РБК'
			
			
			society = ['жители', 
				'люди', 'пробки', 'пробка', 'работа', 
				'работы','кино','транспорт','экология',
				'недвижимость','цены','празднования','продукты',
				'волонтеры','животные','зоопарк','скидки',
				'самоизоляция', 'самоизоляции','индекс','празднования',
				'бизнес', 'православные', 'любители','населения','население',
				'коронавирус', 'коронавируса','COVID-19','COVID19']
			for word in society:
				if re.search(word, div_txt):
					flag = 'Общество'

			politic = ['Путин','мишустин','протесты', 'митинг', 'госдума', 'мэр', 'губернатор'
				'поправки','песков','собчак','навальный','любовь соболь',
				'силуанов','ротенберг','посол','заседание','правительство',
				'правительства','мэрия','мэрии','коррупция']
			for word in politic:
				if re.search(word, div_txt):
					flag = 'Политика'

			IT = ['IOS', 'Android', 'Microsoft', 'Google', 'Яндекс', 'Yandex',
			'xiaomi','samsung','apple','youtube','мобильное','приложение',
			'Блоггер','код','хакеры']
			for word in IT:
				if re.search(word, div_txt):
					flag = 'IT'

			culture = ['кино', 'блокбастер', 'музыкальный клип', 'музыка', 'песня', 'клип', 'трек', 'постановка']
			for word in culture:
				if re.search(word, div_txt):
					flag = 'Культура'
		except:
			continue
		if cursor.execute("SELECT * FROM articles WHERE title=%s",(title,)):
			print(i)
			print("Запись уже существует: " + title[:50] + "... || " + name_src)
			i = i + 1
		else:
			try:
				cursor.execute('INSERT INTO `articles` (`name_src`, `title`, `txt`, `link`, `flag`) VALUES (%s,%s,%s,%s,%s)',(name_src, title, div_txt, link, flag))
				connection.commit()
				print(i)
				print("Запись добавлена!" + title[:50] + "... || " + name_src + "\n" + link)
				i = i + 1
			except:
				continue
connection.close()
