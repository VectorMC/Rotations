require 'net/https'
require 'yaml'

task :default => [:validate]

task :validate do
  begin
    maps = []
    failed = []

    Dir.foreach('servers') do |item|
      next if item == '.' or item == '..'

      maps += YAML.load_file('servers/' + item)["maps"]
    end

    maps.uniq.each do |name|
      page = Net::HTTP.start('maps.avicus.net', 443, :use_ssl => true) do |http|
        http.get('/validate.php?query=' + name)
      end

      if page.body != "true"
        failed += [name]
      end
    end

    if failed.size > 0
      raise failed.join(", ")
    end
  rescue Exception => e
    puts "fail: " + e.message
  end
end