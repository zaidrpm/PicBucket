echo "Converting--------"
for f in  Pictures/*.jpg
do
d=$(sqlite3 data.db "select 'true' from Pictures where name='$f'")
if [ "$d" = "true" ]
then
continue;
fi 
echo "Compressing ----------------> $f"
mogrify -resize 1400x1400\> -quality 85 "$f"
sqlite3 data.db "insert into Pictures values ('$f')"
done
d="Pictures"
echo "Generating thumbnails-------------"
cd "$d"
for f in *.jpg
do
if [ ! -f "thumbnails/$f" ]
then
convert "$f" -resize 200x200^ -gravity center -crop 200x200+0+0 -quality 60 "thumbnails/$f";
fi
done
cd ..
echo "Generating Php------------------"
php -f gen.php  > "$d/index.html"
git add *
git commit -m "$(date)"
git push origin master
