require 'fileutils'

Dir.foreach('servers') do |rot|
  next if rot == '.' or rot == '..'

  found = false

  Dir.foreach('../servers') do |server|
    if rot.casecmp(server).zero?
      src = "servers/#{rot}"
      next unless File.exist?("../servers/#{server}/plugins/Atlas")
      dest = "../servers/#{server}/plugins/Atlas/rotation.txt"
      puts "#{src} -> #{dest}"
      FileUtils.cp_r(src, dest)
      found = true
    end
  end
  
  puts "No match for #{rot}!" unless found
end
